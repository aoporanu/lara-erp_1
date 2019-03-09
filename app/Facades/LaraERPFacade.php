<?php
/**
 * Created by PhpStorm.
 * User: adyopo
 * Date: 09.03.2019
 * Time: 18:30
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LaraERPFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laraERP';
    }
}