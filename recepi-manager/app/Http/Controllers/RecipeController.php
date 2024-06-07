<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Recipe;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RecipeController extends Controller {
    //

    public function getRecipe( $id ) {

        $recipeId1 = $id;

        //Getting all recipes with details

        $data = Recipe::where( 'id', $recipeId1 )->with( 'user', 'category', 'reviews' )->get();

        $arr = [];
        foreach ( $data as $item ) {

            foreach ( $item->reviews as $rating ) {

                $arr[] = $rating->rating;
            }
        }

        $count = count( $arr );
        //To Avoid division by zero
        if ( $count == 0 ) {
            $count = 1;
        }
        $avgRating = array_sum( $arr ) / $count;

        //Getting all comments including users name and rating

        $comments = Review::where( 'recipe_id', $recipeId1 )->with( 'user' )->paginate( 2 );
        if ( $comments->isEmpty() ) {
            $comment = "";
        } else {
            $comment = $comments;
        }

        if ( Like::where( 'user_id', Auth::id() )->where( 'recipe_id', $recipeId1 )->exists() ) {
            $liked = true;
        } else {
            $liked = false;
        }

        return view( 'pages.dish-review-page' )->with( ['data' => $data, 'average' => $avgRating, 'comments' => $comment, 'liked' => $liked] );
    }

    public function postComment( Request $request ) {

        // $userId = $request->Id;
        // $recipeId = $request->id;

        $comment = $request->comment;
        $rating = $request->rating;

        if ( !Auth::check() ) {
            return redirect()->back()->with( 'loginError', 'You must be logged in to post a comment.' );
        }

        try {
            $request->validate( [
                'comment' => 'required',
            ] );

            Review::create( [
                'recipe_id' => 2,
                'user_id'   => Auth::id(),
                // 'user_id'   => 3,
                'rating'    => $rating,
                'comment'   => $comment,

            ] );

            return redirect()->back()->with( 'success', 'Comment posted successfully!' );

        } catch ( ValidationException $exception ) {
            return redirect()->back()->withErrors( $exception->validator->errors() );
        }

    }

    public function postLikes( Request $request ) {

        // $recipe = Recipe::findOrFail($request->id);
        // $userId = Auth::id();
        $recipeId = 1;
        $userId = 1;

        // if ( !Auth::check() ) {
        //     return redirect()->back()->with( 'likeError', 'You must be logged in to like this recipe.' );
        // }

        Like::create([
            'user_id' => $userId,
            'recipe_id' => $recipeId
        ]);

        $data = Recipe::where( 'id', $recipeId )->get();

        $likeCount = 0;
        foreach ( $data as $item ) {
            $likeCount = $item->no_of_likes;
        }

        Recipe::where( 'id', $recipeId )->update( ['no_of_likes' => $likeCount + 1] );
        
        return redirect()->back()->with( 'submitLike', 'Thanks for your likes.' );

    }
}
