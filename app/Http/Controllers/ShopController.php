<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show()
    {
        $path = request()->path();
        $pathArr = explode('/', $path);

        if($pathArr[1] > 0) {
            $shop = Shop::getByPublicId($pathArr[1]);
            return view('shops.show', ['orders' => $shop->orders]);
        }
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(ShopCreateRequest $request)
    {
        $shop = new Shop;
        $shop->name = $request->get('name');
        $shop->agent_id = $request->get('agent_id');
        $shop->lat = $request->get('lat');
        $shop->lng = $request->get('lng');
        $shop->address = $request->get('address');

        $shop->save();

        return redirect('shops.index')->with('message', __('shops.create.saved'));
    }
}
