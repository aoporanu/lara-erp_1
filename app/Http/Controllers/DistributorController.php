<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Http\Requests\DistributorCreateRequest;
use App\User;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();

        return view('distributors.index', ['distributors' => $distributors]);
    }

    public function create()
    {
        return view('distributors.create');
    }

    /**
     * @param DistributorCreateRequest $request
     */
    public function store(DistributorCreateRequest $request)
    {
        $distributor = new Distributor;
        $distributor->name = $request->get('name');
    }

    public function show($username=null)
    {
        if ($username) {
            $user = User::findByUsername($username);
            $distributors = $user->with('distributors.products')->get();
        }
        return view('distributors.show', ['distributors' => $distributors]);
    }
}
