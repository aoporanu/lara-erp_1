<?php

namespace App\Http\Controllers;

use App\Distributor;
use App\Http\Requests\DistributorCreateRequest;
use /** @noinspection PhpUndefinedClassInspection */
    App\User;

class DistributorController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $distributors = Distributor::all();

        return view('distributors.index', ['distributors' => $distributors]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * @param null $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username=null)
    {
        // if setting::multi_division == 1, show only distributors for user, if not show
        // everything.
        // EXCEPT FOR OPERATOR
        if ($username) {
            /** @noinspection PhpUndefinedClassInspection */
            $user = User::findByUsername($username);
            $distributors = $user->with('distributors.products')->get();
        }
        /** @var Distributor $distributors */
        return view('distributors.show', ['distributors' => $distributors]);
    }
}
