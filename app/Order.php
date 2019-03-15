<?php /** @noinspection PhpUndefinedClassInspection */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int created_by
 */
class Order extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'public_id',
        'user_id',
        'created_by'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id', 'public_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator()
    {
        return $this->belongsTo(User::class, 'created_by', 'public_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function storeOrder($request)
    {
        $public_id = 100000;
        $shop = Shop::getByPublicId($request->get('public_id'));
        $order = new Order;
        $order->created_by = $public_id;
        $shop->orders()->save($order);

        return $order;
    }
}
