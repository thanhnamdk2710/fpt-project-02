<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function order_details ()
    {
        return $this->hasMany('App\OrderDetail', 'order_id');
    }
}
