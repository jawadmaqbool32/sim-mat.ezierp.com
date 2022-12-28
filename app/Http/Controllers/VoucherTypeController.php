<?php

namespace App\Http\Controllers;

use App\Models\VoucherType;
use Illuminate\Http\Request;

class VoucherTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return VoucherType::dataTable();
        }
        return view('voucher_types.index');
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
        $request->validate([
            'name' => 'required',
            'short' => 'required'
        ]);
        VoucherType::create([
            'name' => $request->name,
            'short' => $request->short
        ]);
        return response([
            'success' => true,
            'message' => 'New Record Added',
            'table_reload' => true,
        ]);
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
    public function update(Request $request, VoucherType $voucherType)
    {
        $request->validate([
            'name' => 'required'
        ]);
        VoucherType::where('id', $voucherType->id)->update([
            'name' => $request->name,
            'short' => $request->short
        ]);
        return response([
            'success' => true,
            'message' => 'New Record Added',
            'table_reload' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(VoucherType $voucherType)
    {
        $voucherType->delete();
        return response([
            'success' => true,
            'message' => 'Record Deleted',
            'table_reload' => true,
        ]);
    }
}
