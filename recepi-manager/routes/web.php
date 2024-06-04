<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;


// Route::view('/recipeDetails','pages/dish-review-page');
Route::get('/recipeDetails',[RecipeController::class,'getRecipe']);

Route::post('/postComment',[RecipeController::class,'postComment']);
