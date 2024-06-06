<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    // insert recipe
    public function insert(Request $request){
        try{
            $request->validate([
                'title' => 'required',
                'ingredients' => 'required',
                'steps' => 'required',
                'category_id' => 'required',
                'cooking_time' => 'required',
                'calories' => 'required',
                'fat' => 'required',
                'protein' => 'required',
                'carbs' => 'required',
            ]);

            // $recipe->user_id = auth()->user()->id;
            $user_id = 1;
            $title = $request->title;
            $ingredients = $request->ingredients;
            $steps = $request->steps;
            $category_id = $request->category_id;
            $cooking_time = $request->cooking_time;
            $calories = $request->calories;
            $fat = $request->fat;
            $protein = $request->protein;
            $carbs = $request->carbs;
            Recipe::create([
                'user_id' => $user_id,
                'title' => $title,
                'ingredients' => $ingredients,
                'steps' => $steps,
                'category_id' => $category_id,
                'cooking_time' => $cooking_time,
                'calories' => $calories,
                'fat' => $fat,
                'protein' => $protein,
                'carbs' => $carbs
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Recipe inserted successfully'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }



    // get all recipes
    public function getRecipes(){
        $recipes = Recipe::get();
        $categories = Category::get();
        return view('recipes.recipes',[
            'recipes' => $recipes,
            'categories' => $categories
        ]);

    }


    // delete recipe
    public function delete(Request $request){
        $recipe = Recipe::find($request->id);
        if($recipe){
            $recipe->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Recipe deleted successfully'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Recipe not found'
            ]);
        }
    }


    // update recipe
    public function update(Request $request){
        $recipe = Recipe::find($request->id);
        if($recipe){
            $recipe->update([
                'title' => $request->title,
                'ingredients' => $request->ingredients,
                'steps' => $request->steps,
                'category_id' => $request->category_id,
                'cooking_time' => $request->cooking_time,
                'calories' => $request->calories,
                'fat' => $request->fat,
                'protein' => $request->protein,
                'carbs' => $request->carbs
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Recipe updated successfully'
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Recipe not found'
            ]);
        }
    }


    // get recipe
    public function getRecipe($id){
        $recipe = Recipe::find($id);
        if($recipe){
            return response()->json([
                'status' => 200,
                'recipe' => $recipe
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Recipe not found'
            ]);
        }
    }
}
