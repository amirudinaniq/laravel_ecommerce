<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    use HasFactory;

    public $table = 'orders_products';

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'total_price',
        'quantity',
        'updated_at',
        'created_at',
      ];

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'id');
    }
}
