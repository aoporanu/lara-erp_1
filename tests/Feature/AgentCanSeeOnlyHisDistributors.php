<?php

namespace Tests\Feature;

use App\Distributor;
use App\Product;
use App\Setting;
use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
//use Illuminate\Foundation\Testing\WithFaker;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class AgentCanSeeOnlyHisDistributors extends TestCase
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
        $productRoshen = factory(Product::class, 3)->create(['sku' => rand(100000, 200000)]);
        $productKandia = factory(Product::class, 5)->create(['sku' => rand(200000, 300000)]);

        $distributorKandia->products()->attach($productKandia);
        $distributorRoshen->products()->attach($productRoshen);
        $setting = factory(Setting::class)->create(['name' => 'multi_division', 'value' => 1]);

        $response = $this->actingAs($user)
            ->get('/' . $user->username . '/distributors/show');
        $response->assertSeeText('roshen');
        $response->assertDontSeeText('kandia');
    }
}
