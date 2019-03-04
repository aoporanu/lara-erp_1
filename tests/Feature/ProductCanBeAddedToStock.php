<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductCanBeAddedToStock extends TestCase
{
    public function testCanAdd()
    {
        $product = new Product;
        $product->name = 'asd';
        $product->description = 'Lorem ipsum dolor sit amet';
        $product->price = 10.0;
        $product->save();

        $stock = new Stock;
        $stock->qty = 100;
        $stock->name = 'OT20';
        $stock->description = 'asd';
        $stock->price = $product->price - 10/100;
        $stock->product_id = $product->id;
        $stock->save();

        $stock->newStockOn($stock, $product);
    }
}
