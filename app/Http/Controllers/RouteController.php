<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RouteCreateRequest;

class RouteController extends Controller
{
    private $model = null;

    public function __construct()
    {
        $this->model = new Route;
    }

    public function index()
    {
        // code...
    }

    public function store(RouteCreateRequest $request)
    {
        $this->model->storeRoute($request);
    }
}
