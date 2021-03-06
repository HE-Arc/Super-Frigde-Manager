<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id', 'ean_code'
    ];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function favorite()
    {
        return $this->belongsTo(Favorite::class, 'id', 'product_id');
    }
}
