<?php

namespace Tests\Feature;

use App\Distributor;
use App\Product;
use App\Stock;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AgentCanAddHisStockProducts extends TestCase
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
        $stock = factory(Stock::class)->create(['distributor_id' => $distributorKandia->id]);
        $distributorKandia->stocks()->save($stock);
        $distributorKandia->agents()->attach($user);
        $product = factory(Product::class)->create(['sku' => rand(100, 200), 'name' => 'asd', 'description' => 'Lorem ipsum', 'price' => rand(10.0, 30.9), 'lot' => '123456', 'expiry' => Carbon::create(2021, 12, 31)]);
        $user->distributors()->attach($distributorKandia);
        $product->stock()->associate($product);
        $response = $this->actingAs($user)
            ->get('/' . $user->username . '/products');
        $response->assertStatus(200);
    }
}
