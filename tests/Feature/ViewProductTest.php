<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_product_details()
    {
        // Arrange
        $product = Product::factory()->make([
            'name' => 'Prod 1',
            'slug' => 'slug-1',
            'shortDescription' => '150KW, 20Wat',
            'description' => 'Lorem ipsum...',
            'price' => 100,
        ]);
        // Act
        $response = $this->get('/shop/' . $product->id . '/' . $product->slug);
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Prod 1');
        $response->assertSee('150KW, 20Wat');
        $response->assertSee('Lorem ipsum...');
    }

    public function test_show_you_also_might_like_products()
    {
        // Arrange
        $product1 = Product::factory()->make([
            'name' => 'Prod 1',
        ]);

        $product2 = Product::factory()->make([
            'name' => 'Prod 2',
        ]);
        // Act
        $response = $this->get('/shop/' . $product1->id . '/' . $product1->slug);
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Prod 2');
        $response->assertViewHas('mightAlsoLike');
    }
}
