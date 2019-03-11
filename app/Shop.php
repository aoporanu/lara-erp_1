<?php

namespace App;

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
    public static function getByPublicId($int)
    {
        return self::where('public_id', $int)->first();
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'client_id');
    }
}