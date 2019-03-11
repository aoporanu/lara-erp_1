<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\OrderProduct;
use App\Shop;
use /** @noinspection PhpUndefinedClassInspection */
    App\User;

class OrdersController extends Controller
{
    /**
     * @param null $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username = null)
    {
        /** @noinspection PhpUndefinedClassInspection */
        $user = User::findByUsername($username);
        return view('orders.show', ['orders' => $user->orders]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * @param OrderCreateRequest $request
     */
    public function store(OrderCreateRequest $request)
    {
        $public_id = 100000;
        $shop = Shop::getByPublicId($request->get('public_id'));
        $order = new Order;
        $order->created_by = $public_id;
        $shop->orders()->save($order);
        (new OrderProduct)->attachProductsToOrder($order, request()->get('product_list'));
    }
}
