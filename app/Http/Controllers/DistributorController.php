<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Http\Requests\DistributorCreateRequest;

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
}
