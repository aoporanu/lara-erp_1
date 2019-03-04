<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'qty',
        'name',
        'description',
        'price'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
