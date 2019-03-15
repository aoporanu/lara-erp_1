<?php

namespace Tests\Feature;

use App\Route;
use App\Shop;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRouteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $route = Route::findByPublicId(request()->get('public_id')) ? Route::findByPublicId(request()->get('public_id')) : new Route;
        $agent = User::findByPublicId(request()->get('agent_id'));

        $shop = Shop::findByCUI(request()->get('cui'));

        $route->agent()->associate($agent);

        $route->client()->associate($shop);

        $route->save();

        $response = $this->get('/route/' . $route->id);

        $response->assertStatus(200);
    }
}
