<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Ramsey\Uuid\Uuid;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'products';


    protected $fillable = [
        'title','id', 'description', 'price', 'discountPercentage',
        'rating', 'stock', 'brand', 'category', 'thumbnail', 'images',
    ];

    // If you want to cast 'images' as an array
    protected $casts = [
        'images' => 'json',
    ];

}
