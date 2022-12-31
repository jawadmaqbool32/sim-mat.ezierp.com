<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\AccountLevel4;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Voucher;
use App\Models\VoucherType;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = $this->placeOrder($request->all());
            DB::commit();
            return response([
                'success' => true,
                'table_reload' => true,
                'message' => 'New Record Added',
            ]);
        } catch (CustomException $e) {
            DB::rollBack();
            return response([
                $e->getLevel() => true,
                'message' => $e->getMessage(),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response([
                'error' => true,
                'message' => 'Something went wrong',
                'console' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function placeOrder($params)
    {
        if ($params["product"] == false || sizeof($params["product"]) == 0) {
            throw new CustomException('Select some products first', 'error');
        } else {
            $revenue_amount = 0;
            $expense_amount = 0;
            $last_transaction_key = 0;
            $date = Carbon::now()->format('Y-m-d');
            $due = Carbon::now()->addDays(7)->format('Y-m-d');
            $recievable_account = AccountLevel4::where('id', 3)->first();
            $revenue_account = AccountLevel4::where('id', 7)->first();
            $inventory_account = AccountLevel4::where('id', 4)->first();
            $expense_account = AccountLevel4::where('id', 8)->first();
            $voucher_type = VoucherType::where('short', 'INV')->first();
            $voucher_no = $voucher_type->short . '-' . $voucher_type->vouchers->count() + 1;
            $voucher = Voucher::create([
                'voucher_no' => $voucher_no,
                'date' => $date,
                'voucher_type_id' => $voucher_type->id,
                'amount' => 0,
                'type' => 'multiple',
                'description' => 'On store invoice generated',
                'created_by' => auth()->user()->id
            ]);
            $total_orders = Order::count();
            $voucher->refresh();
            $order =  Order::create([
                'order_no' => $voucher_no . '-' . $total_orders,
                'status' => 'generated',
                'date' => $date,
                'due_date' => $due,
                'inv_voucher_id' => $voucher->id
            ]);
            $order->refresh();
            foreach ($params["product"] as $key => $product) {
                $last_transaction_key++;
                $quantity = $params["quantity"][$key];
                $price = $params["price"][$key];
                $product = Product::where('uid', $product)->first();
                $amount = $quantity * $price;
                $amount_ = $quantity * $product->purchase_price;
                if ($quantity > $product->stock) {
                    throw new CustomException("Cannot order more than available stock", 'danger');
                }
                Transaction::create([
                    'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                    'voucher_id' => $voucher->id,
                    'account_id' =>  $recievable_account->id,
                    'amount' => $amount,
                    'type' => 'debit',
                    'source' => 'instore invoice receivable',
                    'description' =>  $product->name . 'x' . $quantity . ' is marked as recievable'
                ]);
                Product::where('uid', $product->uid)->update([
                    'stock' => $product->stock  - $quantity,
                ]);
                OrderProduct::create([
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'price' => $amount,
                    'quantity' => $quantity,
                ]);
                $revenue_amount += $amount;
                $expense_amount += $amount_;
            }
            $last_transaction_key++;
            Transaction::create([
                'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                'voucher_id' => $voucher->id,
                'account_id' =>  $revenue_account->id,
                'amount' => $revenue_amount,
                'type' => 'credit',
                'source' => 'instore invoice revenue',
                'description' => 'Revenue against instore invoice',
            ]);
            $last_transaction_key++;
            Transaction::create([
                'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                'voucher_id' => $voucher->id,
                'account_id' =>  $inventory_account->id,
                'amount' => $expense_amount,
                'type' => 'credit',
                'source' => 'instore inventory credit',
                'description' => 'Products reserved for order',
            ]);
            $last_transaction_key++;
            Transaction::create([
                'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                'voucher_id' => $voucher->id,
                'account_id' =>  $expense_account->id,
                'amount' => $expense_amount,
                'type' => 'debit',
                'source' => 'instore invoice expense',
                'description' => 'Products purchase amount marked as expense',
            ]);

            AccountLevel4::where('id', $recievable_account->id)->update([
                'balance' => $recievable_account->balance + $revenue_amount,
            ]);
            AccountLevel4::where('id', $revenue_account->id)->update([
                'balance' => $revenue_account->balance + $revenue_amount,
            ]);
            AccountLevel4::where('id', $inventory_account->id)->update([
                'balance' => $inventory_account->balance - $expense_amount,
            ]);
            AccountLevel4::where('id', $expense_account->id)->update([
                'balance' => $expense_account->balance + $expense_amount,
            ]);
            Voucher::where('id', $voucher->id)->update([
                'amount' => $revenue_amount
            ]);
        }
    }
}
