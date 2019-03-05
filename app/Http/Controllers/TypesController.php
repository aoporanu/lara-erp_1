<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TypesCreateRequest;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::all();

        return view('types.index', ['types' => $types]);
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(TypesCreateRequest $request)
    {

    }
}
