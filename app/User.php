<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App
 * @method where
 * @method first
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @param $username
     * @return mixed
     */
    public static function findByUsername($username)
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return (new User)->where('username', '=', $username)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function distributors()
    {
        return $this->belongsToMany(Distributor::class, 'distributor_user');
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function findByPublicId($id)
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        return (new User)->where('public_id', $id)->first();
    }

    /**
     * @param null $username
     * @return mixed
     */
    public function getMyProducts($username = null)
    {
        return self::findByUsername($username)
            ->leftJoin('distributor_user', 'users.id', '=', 'distributor_user.user_id')
            ->leftJoin('distributors', 'distributors.id', '=', 'distributor_user.distributor_id')
            ->leftJoin('stocks', 'stocks.distributor_id', '=', 'distributors.id')
            ->leftJoin('products', 'stocks.id_products', '=', 'products.id')
            ->select('distributors.name as dis.name',
                'distributors.id as dis.id',
                'products.id as product.id',
                'products.name as product.name',
                'products.price as product.price',
                'stocks.id as stock.id',
                'stocks.name as stock.name')
            ->get();
    }

    /**
     * HasOne Route
     * @return Collection Route
     */
    public function route()
    {
        return $this->hasMany(Route::class, 'agent_id');
    }
}
