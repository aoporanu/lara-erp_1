<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StocksCreateRequest;
use App\Product;
use App\Type;

class StockController extends Controller
{
    public function index()
    {

    }

    public function create(Product $product=null)
    {
        $categories = Type::where('name', 'stock')->get();
        if ($product) {
            return view('stocks.create', ['product' => $product, 'categories', $categories]);
        }
        return view('stocks.create', ['categories' => $categories]);
    }

    public function store(StocksCreateRequest $request)
    {
        $stock = new Stock;
        $stock->name = $request->get('name');
        $stock->category_id = $request->get('category_id');
        $stock->price = $request->get('price');
        $stock->lot = $request->get('lot');
        $stock->qty = $request->get('qty');
        $stock->save();

        return Redirect::route('stocks.index');
    }
}
