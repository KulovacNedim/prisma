<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Vanjska rasvjeta', 'slug' => 'vanjska-rasvjeta'],
            ['name' => 'Unutrasnja rasvjeta', 'slug' => 'unutrasnja-rasvjeta'],
            ['name' => 'Reflektori', 'slug' => 'reflektori'],
            ['name' => 'Uticnice', 'slug' => 'uticnice'],
            ['name' => 'Prigusnce', 'slug' => 'prigusnice'],
            ['name' => 'Kanalice', 'slug' => 'kanalice'],
        ]);
    }
}
