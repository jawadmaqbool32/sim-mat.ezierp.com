<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use App\Models\AccountLevel4;
use App\Models\Product;
use App\Models\StockHistory;
use App\Models\Transaction;
use App\Models\Voucher;
use App\Models\VoucherType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
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

            if ($request->product == false || sizeof($request->product) == 0) {
                throw new CustomException('Select some products first', 'error');
            } else {
                $total_amount = 0;
                $last_transaction_key = 0;
                $date = date('Y-m-d');
                $voucher_type = VoucherType::where('short', 'APV')->first();
                $liability_account = AccountLevel4::where('id', 5)->first();
                $inventory_account = AccountLevel4::where('id', 4)->first();
                $voucher_no = $voucher_type->short . '-' . $voucher_type->vouchers->count() + 1;
                $voucher = Voucher::create([
                    'voucher_no' => $voucher_no,
                    'date' => $date,
                    'voucher_type_id' => $voucher_type->id,
                    'amount' => 0,
                    'type' => 'multiple',
                    'description' => 'New Stock Added',
                    'created_by' => auth()->user()->id
                ]);
                $voucher->refresh();
                foreach ($request->product as $key => $product) {
                    $last_transaction_key++;
                    $quantity = $request->quantity[$key];
                    $purchase = $request->purchase[$key];
                    $retail = $request->retail[$key];
                    $product = Product::where('uid', $product)->first();
                    $amount = $quantity * $purchase;
                    Transaction::create([
                        'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                        'voucher_id' => $voucher->id,
                        'account_id' =>  $inventory_account->id,
                        'amount' => $amount,
                        'type' => 'debit',
                        'source' => 'stock added to inventory',
                        'description' => $product->name . 'x' . $quantity . ' added to inventory',
                    ]);
                    Product::where('uid', $product->uid)->update([
                        'unit_price' => $retail,
                        'purchase_price' => $purchase,
                        'stock' => $product->stock + $quantity,
                    ]);
                    StockHistory::create([
                        'product_id' => $product->id,
                        'voucher_id' => $voucher->id,
                        'quantity' => $quantity,
                        'purchase' => $purchase,
                        'retail' => $retail,
                    ]);
                    $total_amount += $amount;
                }
                $last_transaction_key++;
                Transaction::create([
                    'transaction_no' => $voucher_no . '-' . $last_transaction_key,
                    'voucher_id' => $voucher->id,
                    'account_id' =>  $liability_account->id,
                    'amount' => $total_amount,
                    'type' => 'credit',
                    'source' => 'stock added to inventory',
                    'description' => 'Liability for new stock',
                ]);
                AccountLevel4::where('id', $liability_account->id)->update([
                    'balance' => $liability_account->balance + $total_amount,
                ]);
                AccountLevel4::where('id', $inventory_account->id)->update([
                    'balance' => $inventory_account->balance + $total_amount,
                ]);
            }

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
            dd($e);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
