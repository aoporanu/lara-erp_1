<?php

namespace Tests\Feature;

use App\Order;
use App\Product;
use App\Shop;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsCanBeAddedToOrder extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create(['username' => 'johndoe', 'role' => 'agent', 'public_id' => rand(100000, 199999)]);
        $order = factory(Order::class)->create(['public_id' => rand(100000, 200000), 'name' => 'test order', 'created_by' => $user->public_id]);
        $shop = factory(Shop::class)->create(['public_id' => rand(100000, 200000), 'name' => 'asd asd asd', 'agent_id' => $user->public_id]);
        $shop->orders()->save($order);

        $products = factory(Product::class, 50)->create(['sku' => rand(100000, 200000)]);

        foreach ($products as $product) {
            $product->qty = rand(10, 3000);
            $order->products()->save($product);
        }


        $user->orders()->save($order);
    }
}
