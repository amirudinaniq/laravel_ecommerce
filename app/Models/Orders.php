<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Orders extends Model
{
    use HasFactory;

    public $table = 'orders';

    protected $fillable = [
        'client_id',
        'client_name',
        'client_address',
        'amount',
        'currency',
        'order_details',
        'updated_at',
        'created_at',
      ];

    //   public function orders_products() {
    //     return $this->hasMany(OrdersProducts::class,'id','product_id');
    // }

    public function ordersProducts()
    {
        return $this->hasMany(OrdersProducts::class,'order_id','id');
    }
}
