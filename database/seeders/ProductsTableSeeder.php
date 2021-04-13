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

        // Unutrasnja rasvjeta
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'LED sijalica',
                'slug' => 'led-sijalica',
                'code' => 'S-0006',
                'imageUrl' => 'products\February2021\0090078_led-sijalica-esperanza-a70-e27-16w-warm-white-a-1340-lm-ell160_550.jpg',
                'shortDescription' => '15W (ekv. 80W), bijela',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 3.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        // Vanjska rasvjeta
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'Prigusnica A30',
                'slug' => 'prigusnica-A30',
                'code' => 'S-0005',
                'imageUrl' => 'products\February2021\prigusnica-za-metalhalogene-zarulje-250w-tz6a-250d-5167-lg.jpg',
                'shortDescription' => '50W - ekv. 150 W, 15cm x 15 cm',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 8.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(2);
        }

        // Reflektori rasvjeta
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'Led reflektor',
                'slug' => 'led-reflektor',
                'code' => 'S-0007',
                'imageUrl' => 'products\February2021\led-reflektor-snage-100w-crni-led2b-logo.jpg',
                'shortDescription' => '50W - ekv. 150 W, 15cm x 15 cm',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 19.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(3);
        }

        // Uticnice
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'Uticnica',
                'slug' => 'uticnica',
                'code' => 'S-0008',
                'imageUrl' => 'products\February2021\0090078_led-sijalica-esperanza-a70-e27-16w-warm-white-a-1340-lm-ell160_550.jpg',
                'shortDescription' => '15W (ekv. 80W), bijela',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 3.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(4);
        }

        // Prigusnice
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'Prigusnica A30',
                'slug' => 'prigusnica-A30',
                'code' => 'S-0005',
                'imageUrl' => 'products\February2021\prigusnica-za-metalhalogene-zarulje-250w-tz6a-250d-5167-lg.jpg',
                'shortDescription' => '50W - ekv. 150 W, 15cm x 15 cm',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 8.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(5);
        }

        // Kanalice
        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => 'Kanalica 30 mm',
                'slug' => 'kanalica-30-mm',
                'code' => 'S-0006',
                'imageUrl' => 'products\February2021\0090078_led-sijalica-esperanza-a70-e27-16w-warm-white-a-1340-lm-ell160_550.jpg',
                'shortDescription' => '15W (ekv. 80W), bijela',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam eius, natus recusandae voluptatibus, unde at eum velit ullam sint beatae voluptate iusto hic. Recusandae quos dolore facilis numquam repellat architecto?',
                'price' => 3.99,
                'quantity' => 100,
                'isActive' => true,
            ])->categories()->attach(6);
        }
    }
}
