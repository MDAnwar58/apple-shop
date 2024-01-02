<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table = 'product_reviews';
    protected $fillable = ['description', 'rating', 'product_id', 'customer_id'];
    function profile()
    {
        return $this->belongsTo(CustomerProfile::class);
    }
    // function profile()
    // {
    //     return $this->hasOne(Profile::class);
    // }
    // function product()
    // {
    //     return $this->hasOne(Product::class);
    // }
}
