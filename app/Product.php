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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function distributors()
    {
        return $this->belongsToMany(Distributor::class);
    }

    /**
     * @param $request
     * @return Product
     */
    public function storeProduct($request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();

        return $product;
    }
}
