<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->charts) {
                $date = date('Y-m-d');
                $todayExpense = Transaction::where('source', 'stock added to inventory')->where('type', 'debit')->where('created_at', 'LIKE', $date . '%')->sum('amount');
                $todayRevenue = Transaction::where('source', 'instore invoice revenue')->where('type', 'credit')->where('created_at', 'LIKE', $date . '%')->sum('amount');
                return response([
                    'profit' => [
                        $todayRevenue,
                        $todayExpense,
                    ],
                    'success' => true
                ]);
            } else {
                $products = Product::select('uid', 'name', 'purchase_price', 'unit_price', 'stock')->get();
                return response([
                    'products' => $products,
                    'success' => true
                ]);
            }
        }
        return view('dashboard.dashboard');
    }
}
