<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;

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
}
