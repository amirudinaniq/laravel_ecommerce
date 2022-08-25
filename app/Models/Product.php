<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image_name',
        'price',
        'sale_price',
        'created_at',
        'updated_at',
    ];
}
