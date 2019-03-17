<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $cui)
 */
class Client extends Model
{
    /**
     * @param $cui
     * @return mixed
     */
    public static function findByCUI($cui)
    {
        return self::where('cui', $cui)->first();
    }
}
