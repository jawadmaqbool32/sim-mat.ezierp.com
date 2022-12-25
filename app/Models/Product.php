<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends UIDModel
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeGetAll($query)
    {
        return $query;
    }

    public function categories()
    {
        return $this->hasManyThrough(
            Category::class,
            ProductCategories::class,
            'product_id',
            'id',
            'id',
            'category_id',
        );
    }
}
