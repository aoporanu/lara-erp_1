<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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
        return self::where('username', '=', $username)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function distributors()
    {
        return $this->belongsToMany(Distributor::class, 'distributor_user');
    }
}
