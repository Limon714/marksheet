<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Review;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //

    public function getRecipe(Request $request) {

        // $recipeId = $request->id;

        $data = Recipe::where('id',2)->with('user','category','reviews')->get();

        return view('pages.dish-review-page')->with(['data'=>$data]);
    }



    public function postComment(Request $request) {

        // $userId = $request->Id;
        // $recipeId = $request->id;

        $comment = $request->comment;
        $rating = $request->rating;


        Review::create([
            'recipe_id' => 1,
            'user_id' => 2,
            'rating' => $rating,
            'comment' => $comment

        ]);

        return back();


    }
}
