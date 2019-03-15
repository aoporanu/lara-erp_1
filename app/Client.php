<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public static function findByCUI($cui)
    {
        return self::where('cui', $cui)->first();
    }
}
