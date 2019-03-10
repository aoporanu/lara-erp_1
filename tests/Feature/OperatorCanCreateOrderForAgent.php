<?php

namespace Tests\Feature;

use App\Order;
use App\Shop;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OperatorCanCreateOrderForAgent extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $userAgent = factory(User::class)->create(['username' => 'johndoe', 'role' => 'agent', 'public_id' => rand(100000, 199999)]);
        $userOperator = factory(User::class)->create(['username' => 'johndoe_operator', 'role' => 'operator', 'public_id' => rand(100000, 199999)]);

        $order = factory(Order::class)->create(['public_id' => rand(100000, 200000), 'name' => 'test order', 'created_by' => $userOperator->public_id ? $userOperator->public_id : $userAgent->public_id]);
        $shop = factory(Shop::class)->create(['public_id' => rand(100000, 200000), 'name' => 'asd asd asd', 'agent_id' => $userAgent->public_id]);
        $shop->orders()->save($order);

        $userAgent->orders()->save($order);

        $this->assertEquals($order->created_by, $order->user_id);
    }
}
