<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Order extends UIDModel
{
    use HasFactory;
    protected $guarded = ['id'];


    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
    public function orderUser()
    {
        return $this->hasMany(OrderUser::class, 'order_id', 'id');
    }

    public function invVoucher()
    {
        return $this->hasOne(Voucher::class, 'id', 'inv_voucher_id');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            OrderProduct::class,
            'order_id',
            'id',
            'id',
            'product_id',
        );
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            OrderUser::class,
            'order_id',
            'id',
            'id',
            'user_id',
        );
    }

    public function scopeGet($query)
    {
        return $query;
    }

    public  function scopeDataTable($query)
    {
        $orders = $query;
        return DataTables::of($orders)
            ->addIndexColumn()
            ->editColumn('status', function ($order) {
                $text = ucwords($order->status);
                if ($order->status == 'paid') {
                    $color = 'btn-success';
                } elseif ($order->status == 'generated') {
                    $text = $text . ' (' . date('d M, Y', strtotime($order->due_date)) . ')';
                    $color = 'btn-warning';
                } else {
                    $color = 'btn-danger';
                }
                return '<button class="btn btn-sm ' . $color . '">' . $text . '</button>';
            })
            ->addColumn('action', function ($order) {
                $btns = [];

                $btns[] = '<a  href="' . route('order.print', $order->uid) . '" data-bs-toggle="tooltip" tabindex="0" title="Print Invoice"  class="mx-1 float-end btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-button">
            <span class="svg-icon svg-icon-3">
            <i class="fonticon-printer fs-3"></i>
            </span>
        </a>';
                if (auth()->user()->hasPermission('cancel order') && $order->status == 'generated') {

                    $btns[] = '<a href="#" data-modal_id="' . $order->id . '" data-modal_name="' . $order->order_no . '"  data-bs-toggle="modal" data-bs-target="#cancel_order_modal" data-bs-toggle="tooltip" tabindex="0" title="Cancel Order" data-base-url="' . route('order.cancel', $order->uid) . '"  class="mx-1 float-end btn btn-icon btn-bg-light btn-active-color-primary btn-sm modal-button">
            <span class="svg-icon svg-icon-3">
            <i class="bi bi-arrow-counterclockwise"></i>
            </span>
        </a>';
                }

                if (count($btns)) {
                    return implode($btns);
                } else {
                    return null;
                }
            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }
}
