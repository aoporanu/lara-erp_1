<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TypesCreateRequest;
use App\Type;

class TypesController extends Controller
{
    /**
     * @param null $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index($type=null)
    {
        if (request()->ajax()) {
            $types = Type::where('for', '=', $type)->get(['id', 'name']);

            return response()->json($types);
        }
        $types = Type::all();
        return view('types.index', ['types' => $types]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * @param TypesCreateRequest $request
     */
    public function store(TypesCreateRequest $request)
    {

    }
}
