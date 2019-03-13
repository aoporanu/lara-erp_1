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
        'product_id',
        'distributor_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function distributor()
    {
        return $this->belongsTo(Distributor::class);
    }
}
