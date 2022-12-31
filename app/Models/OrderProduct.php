<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function order()
    {
        $this->hasOne(Order::class, 'id', 'order_id');
    }
}
