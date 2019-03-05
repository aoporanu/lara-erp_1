<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StocksCreateRequest;
use App\Stock;
use App\Product;
use App\Type;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::leftJoin('products', 'stocks.product_id', '=', 'products_id')
        ->leftJoin('types', 'stocks.category_id', '=', 'types.id')
            ->select('stocks.id', 'stocks.name', 'stocks.created_at', 'stocks.price as sprice', 'stocks.category_id', 'stocks.product_id', 'products.price as pprice', 'products.name as pname', 'types.name as tname')
            ->get();
        return view('stocks.index', ['stocks' =>  $stocks]);
    }

    public function create(Product $product=null)
    {
        // to get things like GRAT or OTB
        $categories = Type::where('for', 'stock')->get(['id', 'name']);
        // dump($categories);
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
        $stock->product_id = $request->get('product');
        $stock->price = $request->get('price');
        $stock->lot = $request->get('lot');
        $stock->qty = $request->get('qty');
        $stock->description = $request->get('description');
        $stock->save();

        // create movement

        return Redirect::route('stocks.index');
    }
}
