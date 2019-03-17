<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 */
class Distributor extends Model
{
    protected $fillable = [
        'public_id',
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agents()
    {
        /** @noinspection PhpUndefinedClassInspection */
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
