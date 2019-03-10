<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show($username = null)
    {
        $user = User::findByUsername($username);
        return view('orders.show', ['orders' => $user->orders]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(OrderCreateRequest $request)
    {

    }
}
