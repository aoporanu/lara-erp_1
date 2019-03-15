<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id', 'public_id');
    }

    /**
     * @param $publicId
     * @return mixed
     */
    public static function findByPublicId($publicId)
    {
        return self::where('public_id', $publicId)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'shop_id', 'cui');
    }
}
