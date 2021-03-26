<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'LED sijalica',
            'slug' => 'led-sijalica',
            'code' => 'S-0006',
            'imageUrl' => 'products\February2021\0090078_led-sijalica-esperanza-a70-e27-16w-warm-white-a-1340-lm-ell160_550.jpg',
            'shortDescription' => '15W (ekv. 80W), bijela',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
            'price' => 3.99,
            'quantity' => 100,
            'isActive' => true,
            'image' => '',
            'images' => null,
            'new_price' => null,
            'is_top_product' => false,
            'is_discount' => false,
            'brand' => null
        ];
    }
}
