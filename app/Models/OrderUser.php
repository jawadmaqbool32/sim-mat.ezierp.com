<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;
    public function order()
    {
        $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function user()
    {
        $this->hasOne(User::class, 'id', 'user_id');
    }
}
