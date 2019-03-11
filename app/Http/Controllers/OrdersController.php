<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * @param null $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username = null)
    {
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

    }
}
