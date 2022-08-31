<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'carts';

    protected $fillable = [
      'product_id',
      'quantity',
      'price',
      'user_id',
      'deleted_at',
      'created_at',
      'updated_at',
    ];

    //Relationship with product.

    public function product(){
     return $this->hasMany(Product::class,'id','product_id');
    }
}
