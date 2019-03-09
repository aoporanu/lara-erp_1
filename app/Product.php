<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed description
 * @property mixed price
 */
class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
