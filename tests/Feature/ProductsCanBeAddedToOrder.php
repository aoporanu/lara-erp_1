<?php

namespace Tests\Feature;

use App\Distributor;
use App\Order;
use App\OrderProduct;
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
        $distributor0 = factory(Distributor::class)->create(['public_id' => rand(100000, 200000), 'name' => 'kandia']);
        $distributor1 = factory(Distributor::class)->create(['public_id' => rand(100000, 200000), 'name' => 'scandia']);
        $distributor2 = factory(Distributor::class)->create(['public_id' => rand(100000, 200000), 'name' => 'nestle']);

        $distributor0->products()->attach($products->random());
        $distributor1->products()->attach($products->random());
        $distributor2->products()->attach($products->random());

        foreach ($products as $product) {
            $orderProduct = factory(OrderProduct::class)->create(['order_id' => $order->id, 'product_id' => $product->id, 'qty' => rand(1, 3000), 'price' => rand(.9, 100)]);
//            $product->qty = rand(10, 3000);
            $order->products()->attach($orderProduct, ['qty' => rand(1, 3000), 'price' => rand(.9, 100)]);
        }


        $user->orders()->save($order);

        dump($user->with(['orders', 'products'])->get());

    }
}
