<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    /**
     * @param Order $order
     * @param array $orderProducts
     */
    public function attachProductsToOrder(Order $order, array $orderProducts)
    {
        foreach ($orderProducts as $orderProduct) {
            $op = explode(':', $orderProduct);
            $orderProd = new OrderProduct(['order_id' => $order->id, 'product_id' => $op[0]]);
            $order->products()->attach($orderProd, ['qty' => $op[1], 'price' => Product::where('id', $op[0])->first()->price]);
        }
    }
}
