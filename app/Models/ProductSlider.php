<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_des', 'price', 'image', 'product_id'];
    // function product()
    // {
    //     return $this->hasOne(Product::class);
    // }
}
