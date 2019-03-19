<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'public_id');
    }

    /**
     * @param $publicId
     * @return mixed
     */
    public static function findByPublicId($publicId)
    {
        return self::where('public_id', $publicId)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->hasMany(Client::class, 'id', 'shop_id');
    }

    public function storeRoute($request)
    {
        $route = new Route;
        $route->agent_id = $request->get('user');
        $route->shop_id = $request->get('shop_id');
        $route->ceil = $request->get('ceil');
        $route->payment_due = $request->get('payment_due');


        if($route->save()) {
            return ['message' => __('route.pages.create.route_saved')];
        }

        return ['message' => __('route.pages.create.error_saving')];
    }
}
