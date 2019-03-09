<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed category_id
 * @property mixed product_id
 * @property mixed price
 * @property mixed lot
 * @property mixed qty
 * @property mixed description
 */
class Stock extends Model
{
    protected $fillable = [
        'qty',
        'name',
        'description',
        'price',
        'lot',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
