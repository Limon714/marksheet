<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'recipe_id' => 1,
                'user_id' => 2,
                'rating' => 5,
                'comment' => 'This Spaghetti Bolognese is amazing!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'recipe_id' => 2,
                'user_id' => 1,
                'rating' => 4,
                'comment' => 'The Chicken Salad was delicious, but could use a bit more seasoning.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
