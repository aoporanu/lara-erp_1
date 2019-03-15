<?php

namespace App;

use App\Http\Requests\ShopCreateRequest;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed agent_id
 * @property mixed lat
 * @property mixed lng
 * @property mixed address
 */
class Shop extends Model
{
    /**
     * @param $int
     * @return mixed
     */
    public static function getByPublicId($int)
    {
        return self::where('public_id', $int)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }

    /**
     * @param ShopCreateRequest $request
     * @param $shop
     * @return array | bool
     */
    public function createShop($request, &$shop): array
    {
        $shop = new Shop;
        $shop->name = $request->get('name');
        $shop->agent_id = $request->get('agent_id');
        $shop->lat = $request->get('lat');
        $shop->lng = $request->get('lng');
        $shop->address = $request->get('address');

        if ($shop->save()) {
            return ['status' => 'saved', 'message' => __('shops.pages.create.saved'), 'shop' => $shop];
        }
        return false;
    }

    public static function findByCUI($cui)
    {
        return self::where('cui', $cui)->first();
    }
}
