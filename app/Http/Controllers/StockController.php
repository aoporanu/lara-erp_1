<?php

namespace App\Http\Controllers;

use App\Http\Requests\StocksCreateRequest;
use App\Stock;
use App\Product;
use App\Type;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stocks = Stock::leftJoin('products', 'stocks.product_id', '=', 'products.id')
            ->leftJoin('types', 'stocks.category_id', '=', 'types.id')
            ->select('stocks.id', 'stocks.name', 'stocks.created_at', 'stocks.price as sprice', 'stocks.category_id', 'stocks.product_id', 'products.price as pprice', 'products.name as pname', 'types.name as tname', 'stocks.qty as sqty', 'stocks.lot')
            ->get();
        return view('stocks.index', ['stocks' => $stocks]);
    }

    /**
     * @param Product|null $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Product $product = null)
    {
        if ($product) {
            // to get things like GRAT or OTB
            $categories = Type::where('for', 'stock')->get(['id', 'name']);
            return view('stocks.create', ['product' => $product, 'categories', $categories]);
        }
        return view('stocks.create');
    }

    /**
     * @param StocksCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StocksCreateRequest $request)
    {
        $stock = new Stock;
        $stock->name = $request->get('name');
        $stock->category_id = $request->get('category__id');
        $stock->product_id = $request->get('product_id');
        $stock->price = $request->get('price');
        $stock->lot = $request->get('lot');
        $stock->qty = $request->get('qty');
        $stock->description = $request->get('description');
        try {
            $stock->save();
        } catch (Exception $ex) {
            abort(500, 'Could not create stock');
        }

        // create movement

        return Redirect::route('stocks.index');
    }
}
