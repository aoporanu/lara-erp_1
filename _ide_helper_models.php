<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Shop
 *
 * @property mixed name
 * @property mixed agent_id
 * @property mixed lat
 * @property mixed lng
 * @property mixed address
 * @property int $id
 * @property int $public_id
 * @property string $name
 * @property int $agent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Shop whereUpdatedAt($value)
 */
	class Shop extends \Eloquent {}
}

namespace App{
/**
 * App\Setting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 */
	class Setting extends \Eloquent {}
}

namespace App{
/**
 * Class User
 *
 * @package App
 * @method where
 * @method first
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Distributor[] $distributors
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Distributor
 *
 * @property string name
 * @property int $id
 * @property int $public_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $agents
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Distributor whereUpdatedAt($value)
 */
	class Distributor extends \Eloquent {}
}

namespace App{
/**
 * App\OrderProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Order $order
 * @property-read \App\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderProduct whereUpdatedAt($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App{
/**
 * App\Product
 *
 * @property mixed name
 * @property mixed description
 * @property mixed price
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $description
 * @property float|null $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Distributor[] $distributors
 * @property-read \App\Stock $stock
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App{
/**
 * App\Stock
 *
 * @property mixed name
 * @property mixed category_id
 * @property mixed product_id
 * @property mixed price
 * @property mixed lot
 * @property mixed qty
 * @property mixed description
 * @method static leftJoin(string $string, string $string1, string $string2, string $string3)
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $description
 * @property float|null $price
 * @property int $qty
 * @property int|null $products_id
 * @property int|null $category_id
 * @property int|null $product_id
 * @property string|null $lot
 * @property-read \App\Distributor $distributor
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereProductsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Stock whereUpdatedAt($value)
 */
	class Stock extends \Eloquent {}
}

namespace App{
/**
 * App\Order
 *
 * @property int created_by
 * @property int $id
 * @property int $client_id
 * @property int $public_id
 * @property int $user_id
 * @property int $created_by
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $agent
 * @property-read \App\User $operator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App{
/**
 * App\Type
 *
 * @method static where(string $string, string $string1, $type)
 * @property int $id
 * @property string $name
 * @property string $val
 * @property string $for
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Type whereVal($value)
 */
	class Type extends \Eloquent {}
}

