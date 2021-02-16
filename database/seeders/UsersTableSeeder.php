<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $ceoRole = Role::where('name', 'ceo')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.ba',
            'password' => Hash::make('password')
        ]);

        $ceo = User::create([
            'name' => 'CEO User',
            'email' => 'ceo@admin.ba',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'User User',
            'email' => 'user@admin.ba',
            'password' => Hash::make('password')
        ]);

        $admin->roles()->attach($adminRole);
        $ceo->roles()->attach($ceoRole);
        $user->roles()->attach($userRole);
    }
}
