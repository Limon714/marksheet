<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Appetizers', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Main Dishes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salads', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Soups', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beverages', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Breakfast', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Side Dishes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Snacks', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sauces', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('categories')->insert($categories);
    }
}
