<?php

namespace App\Http\Controllers;

use App\Http\Requests\StocksCreateRequest;
use App\Stock;
use App\Product;
use App\Type;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    private $stockModel = null;

    public function __construct()
    {
        $this->stockModel = new Stock;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $stocks = $this->stockModel->getStocks();
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
            /** @noinspection PhpParamsInspection */
            /** @var  $categories */
            /** @noinspection PhpMethodNotFound */
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
        $this->stockModel->createStock($request);

        // create movement

        return Redirect::route('stocks.index');
    }
}
