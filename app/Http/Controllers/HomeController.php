<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::select('uid', 'name', 'purchase_price', 'unit_price', 'stock')->get();
            return response([
                'products' => $products,
                'success' => true
            ]);
        }
        return view('dashboard.dashboard');
    }
}
