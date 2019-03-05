<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductCreateRequest $request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();
        if($request->get('btn_save')) {
            return redirect()->back()->with('message', __('products.pages.create.page_save'));
        }
        if($request->get('btn_continue')) {
            return redirect('products.index')->with('message', __('products.pages.create.page_index'));
        }
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
}
