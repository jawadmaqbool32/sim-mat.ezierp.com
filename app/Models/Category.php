<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends UIDModel
{
    use HasFactory;
    protected $guarded = ['id'];
    public function scopeGetAll($query)
    {
        return $query;
    }


}
