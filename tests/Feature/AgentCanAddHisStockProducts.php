<?php

namespace Tests\Feature;

use App\Distributor;
use App\Stock;
use App\User;
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

        $response = $this->actingAs($user)
            ->get('/' . $user->username . '/products');

        $response->assertStatus(200);
    }
}
