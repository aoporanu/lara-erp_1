<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TypesCreateRequest;
use App\Type;

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

    public function get($type=null)
    {
        $types = Type::where('for', '=', $type)->get(['id', 'name']);
        return json_encode($types);
    }
}
