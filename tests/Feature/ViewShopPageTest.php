<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewShopPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_shop_page_loads_correctly()
    {
        // Arrange
        // Act
        $response = $this->get('/shop');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('KATEGORIJE');
    }

    public function test_products_are_visiable()
    {
        // Arrange
        $top_product = Product::factory()->make([
            'isActive' => true,
        ]);
        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertSee($top_product->name);
        $response->assertSee($top_product->price);
    }

    public function test_paginations_for_products_works()
    {
        // Arrange
        // Page 1 products
        for ($i = 11; $i < 20; $i++) {
            Product::factory()->make([
                'is_top_product' => true,
                'name' => 'Product ' . $i,
            ]);
        }

        // Page 2 products
        for ($i = 21; $i < 30; $i++) {
            Product::factory()->make([
                'is_top_product' => true,
                'name' => 'Product ' . $i,
            ]);
        }
        // Act
        $response = $this->get('/shop');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Product 11');
        $response->assertSee('Product 19');

        // Act
        $response = $this->get('/shop?page=2');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Product 21');
        $response->assertSee('Product 29');
    }

    public function test_categories_are_listed()
    {
        // Arrange
        // Act
        $response = $this->get('/shop');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('SVI ARTIKLI');
    }

    public function test_categories_page_shows_correct_products()
    {
        // Arrange
        $prod1 = Product::factory()->make([
            'name' => 'Prod 1',
        ]);
        $prod2 = Product::factory()->make([
            'name' => 'Prod 2',
        ]);
        $category = Category::create([
            'name' => 'Products',
            'slug' => 'products'
        ]);
        $prod1->categories()->attach($category->id);
        $prod2->categories()->attach($category->id);
        // Act
        $response = $this->get('/shop?id=1&category=category');
        // Assert
        $response->assertStatus(200);
        $response->assertSee('Prod 1');
        $response->assertSee('Prod 2');
    }

    public function test_categories_page_does_not_shows_products_from_another_category()
    {
        // Arrange
        $prod1 = Product::factory()->make([
            'name' => 'Prod 1',
        ]);
        $prod2 = Product::factory()->make([
            'name' => 'Prod 2',
        ]);
        $category = Category::create([
            'name' => 'Products',
            'slug' => 'products'
        ]);
        $prod1->categories()->attach($category->id);
        $prod2->categories()->attach($category->id);

        $anotherProd1 = Product::factory()->make([
            'name' => 'Prod 3',
        ]);
        $anotherProd2 = Product::factory()->make([
            'name' => 'Prod 4',
        ]);
        $anotherCategory = Category::create([
            'name' => 'Another Products',
            'slug' => 'another-products'
        ]);
        $anotherProd1->categories()->attach($anotherCategory->id);
        $anotherProd2->categories()->attach($anotherCategory->id);


        // Act
        $response = $this->get('/shop?id=1&category=category');
        // Assert
        $response->assertStatus(200);
        $response->assertDontSee('Prod 3');
        $response->assertDontSee('Prod 4');
    }
}
