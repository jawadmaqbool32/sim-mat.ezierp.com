<?php

namespace App\Http\Controllers;

use App\Models\AccountLevel1;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $accounts = AccountLevel1::with('level2.level3.level4')->get();
        if ($request->ajax()) {
            $tree =  view('accounts.tree', compact('accounts'))->render();
            return response([
                'success' => true,
                'tree' => $tree
            ]);
        }
        return view('accounts.index');
    }
}
