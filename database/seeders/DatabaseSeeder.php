<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        $data = [
            ['name' => 'our restaurant', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
            ['name' => 'awarded chefs', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
            ['name' => 'menue', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
            ['name' => 'gallery', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
            ['name' => 'chefs', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
            ['name' => 'number', 'value' => '0123456789'],
            ['name' => 'contact', 'value' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis'],
        ];
        foreach ($data as $row) {

            Setting::factory()->create(
                [
                    'name' => $row['name'],
                    'value' => $row['value'],
                ]
            );
        }





        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            ChefSeeder::class,
        ]);
    }
}
