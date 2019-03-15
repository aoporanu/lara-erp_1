<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Product;

class ProductController extends Controller
{
    private $productModel = null;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->productModel = new Product;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();

        if(request()->ajax()) {
            // @TODO get only products where the agent is registered to sell the distributor's products.
            $products = Product::select('id', 'name')->get();

            return response()->json($products);
        }

        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductCreateRequest $request)
    {
        $this->productModel->storeProduct($request);
        if($request->get('btn_save')) {
            return redirect()->back()->with('message', __('products.pages.create.page_save'));
        }
        if($request->get('btn_continue')) {
            return redirect('products.index')->with('message', __('products.pages.create.page_index'));
        }
    }

    /**
     * @param Product $product
     */
    public function delete(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }
    }
}
