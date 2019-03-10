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
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 */
class Stock extends Model
{
    protected $fillable = [
        'qty',
        'name',
        'description',
        'price',
        'lot',
        'category_id',
        'product_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
