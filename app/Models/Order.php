<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    public $timestamps = false;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'cart_id', 'food_id', 'quantity'
    ];
}
