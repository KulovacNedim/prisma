<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewLandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_loads_correctly()
    {
        // Arrange
        // Act
        $response = $this->get('/');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Elektroprizma');
    }

    public function test_top_products_are_visiable()
    {
        // Arrange
        $top_product = Product::factory()->make([
            'is_top_product' => true,
        ]);
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee($top_product->name);
        $response->assertSee($top_product->price);
    }

    public function test_discount_products_are_visiable()
    {
        // Arrange
        $discount_product = Product::factory()->make([
            'is_discount' => true,
        ]);
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee($discount_product->name);
        $response->assertSee($discount_product->price);
    }
}
