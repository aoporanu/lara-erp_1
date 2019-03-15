<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Shop;

class ShopController extends Controller
{
    private $shopModel = null;

    /**
     * ShopController constructor.
     */
    public function __construct()
    {
        $this->shopModel = new Shop;
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $path = request()->path();
        $pathArr = explode('/', $path);

        if ($pathArr[1] > 0) {
            $shop = $this->shopModel::getByPublicId($pathArr[1]);
            return view('shops.show', ['orders' => $shop->orders]);
        }
        return ['status' => 'error', 'message' => __('shops.pages.show.not-found')];
    }

    public function create()
    {
        return view('shops.create');
    }

    /**
     * @param ShopCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ShopCreateRequest $request)
    {
        $this->shopModel->createShop($request, $shop);

        return redirect('shops.index');
    }


}
