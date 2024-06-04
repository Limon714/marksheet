<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'user_id' => 1,
                'title' => 'Spaghetti Bolognese',
                'ingredients' => 'Spaghetti, Ground Beef, Tomato Sauce, Onion, Garlic, Olive Oil, Salt, Pepper',
                'steps' => '1. Cook spaghetti. 2. Brown the beef. 3. Add sauce and simmer. 4. Serve.',
                'category_id' => 1, // Assuming category_id 1 exists
                'cooking_time' => 30,
                'calories' => 600,
                'fat' => 20,
                'protein' => 30,
                'carbs' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Chicken Salad',
                'ingredients' => 'Chicken Breast, Lettuce, Tomatoes, Cucumbers, Olive Oil, Lemon Juice, Salt, Pepper',
                'steps' => '1. Grill the chicken. 2. Chop vegetables. 3. Mix everything together.',
                'category_id' => 2, // Assuming category_id 2 exists
                'cooking_time' => 15,
                'calories' => 300,
                'fat' => 10,
                'protein' => 25,
                'carbs' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
