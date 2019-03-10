<?php
/**
 * Created by PhpStorm.
 * User: adyopo
 * Date: 10.03.2019
 * Time: 11:36
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use App\Order;

class ViewAgentsOrdersTest extends TestCase
{
    use DatabaseMigrations;

    public function testViewingAgentsOrders()
    {
        $user = factory(User::class)->create(['username' => 'johndoe', 'role' => 'agent', 'public_id' => rand(10000, 19999)]);
        $order = factory(Order::class)->make(['client_id' => rand(1, 200), 'public_id' => rand(100000, 200000), 'name' => 'test order']);
        $user->orders()->save($order);

        $this->get('/orders/johndoe')->assertSeeText('test order');
    }
}
