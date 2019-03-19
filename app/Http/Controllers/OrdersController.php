<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Order;
use App\OrderProduct;
use /** @noinspection PhpUndefinedClassInspection */
    App\User;
use App\Client;
use Illuminate\Support\Facades\Request;

class OrdersController extends Controller
{
    private $orderModel = null;

    /**
     * OrdersController constructor.
     * @param null $orderModel
     */
    public function __construct()
    {
        $this->orderModel = new Order;
    }


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
        $client = Client::findByCUI(Request::get('client'));
        return view('orders.create', ['client' => $client]);
    }

    /**
     * @param OrderCreateRequest $request
     */
    public function store(OrderCreateRequest $request)
    {
        $order = $this->orderModel->storeOrder($request);
        (new OrderProduct)->attachProductsToOrder($order, request()->get('product_list'));
    }
}
