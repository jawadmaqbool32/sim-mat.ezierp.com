<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends UIDModel
{
    use HasFactory;
    protected $guarded = ['id'];


    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
    public function orderUser()
    {
        return $this->hasMany(OrderUser::class, 'order_id', 'id');
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
}
