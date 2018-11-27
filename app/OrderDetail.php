<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $fillable = [
        'order_id', 'product_id', 'quantity'
    ];
}
