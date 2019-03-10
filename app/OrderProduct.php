<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    public function product()
    {
        return $this->hasOne(Product::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
