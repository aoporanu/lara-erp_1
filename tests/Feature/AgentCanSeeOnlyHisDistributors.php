<?php

namespace Tests\Feature;

use App\Distributor;
use App\Product;
use App\Setting;
use App\User;
use Carbon\Carbon;
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
        $productRoshen = factory(Product::class, 3)->create([
            'sku' => rand(100000, 200000),
            'name' => 'praline',
            'lot' => '123456',
            'price' => 10.1,
            'expiry' => Carbon::createMidnightDate(2020, 01, 1)
        ]);
        $productKandia = factory(Product::class, 5)->create([
            'sku' => rand(200000, 300000),
            'name' => 'praline',
            'lot' => '123465',
            'price' => 11.3,
            'expiry' => Carbon::createMidnightDate(2020, 01, 1)
        ]);

        $distributorKandia->products()->save($productKandia->first());
        $distributorRoshen->products()->save($productRoshen->first());
        $setting = factory(Setting::class)->create(['name' => 'multi_division', 'value' => 1]);

        $response = $this->actingAs($user)
            ->get('/' . $user->username . '/distributors/show');
        $response->assertSeeText('roshen');
        $response->assertDontSeeText('kandia');
    }
}
