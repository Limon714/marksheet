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
        DB::table('categories')->insert([
            [
                'name' => 'Main Course',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dessert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Appetizer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
