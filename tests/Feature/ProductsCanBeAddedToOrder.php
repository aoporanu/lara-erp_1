<?php

namespace Tests\Feature;

use App\Distributor;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Shop;
use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductsCanBeAddedToOrder extends TestCase
{
    use DatabaseMigrations, InteractsWithAuthentication;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create(['username' => 'johndoe', 'role' => 'agent', 'public_id' => rand(100000, 200000)]);
        $distributorKandia = factory(Distributor::class)->create(['public_id' => rand(100000, 200000), 'name' => 'kandia']);
        $distributorRoshen = factory(Distributor::class)->create(['public_id' => rand(100000, 200000), 'name' => 'roshen']);
        $distributorRoshen->agents()->attach($user);
        $user->distributors()->attach($distributorRoshen);
        $productRoshen = factory(Product::class, 50)->create(['public_id' => rand(100000, 200000)]);
        $productKandia = factory(Product::class, 25)->create(['sku' => rand(200000, 300000)]);

        $distributorKandia->products()->attach($productKandia);
        $distributorRoshen->products()->attach($productRoshen);

        $response = $this->actingAs($user)
            ->get('/' . $user->username . '/distributors/show');
        $response->assertSeeText('roshen');
    }
}
