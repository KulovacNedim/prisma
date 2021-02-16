<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Prigusnica A30',
            'slug' => 'prigusnica-A30',
            'code' => 'S-0005',
            'imageUrl' => 'prigusnica-za-metalhalogene-zarulje-250w-tz6a-250d-5167-lg',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
            'price' => 8.99,
            'quantity' => 100,
            'isActive' => true,
        ]);

        Product::create([
            'name' => 'LED sijalica',
            'slug' => 'led-sijalica',
            'code' => 'S-0006',
            'imageUrl' => '0090078_led-sijalica-esperanza-a70-e27-16w-warm-white-a-1340-lm-ell160_550',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
            'price' => 3.99,
            'quantity' => 100,
            'isActive' => true,
        ]);

        Product::create([
            'name' => 'Led reflektor',
            'slug' => 'led-reflektor',
            'code' => 'S-0007',
            'imageUrl' => 'led-reflektor-snage-100w-crni-led2b-logo',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
            'price' => 19.99,
            'quantity' => 100,
            'isActive' => true,
        ]);
    }
}
