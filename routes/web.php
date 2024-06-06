<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;



// category api all route
Route::post('/add-category',[CategoryController::class,'insert'])->name('add-category');
Route::get('/get-all-categories',[CategoryController::class,'getCategories']);
Route::post('/delete-category',[CategoryController::class,'delete'])->name('category.destroy');
Route::post('/update-category',[CategoryController::class,'update']);
Route::get('/get-category/{id}',[CategoryController::class,'getCategory'])->name('category.edit');


// recipe api all route
Route::post('/add-recipe',[RecipeController::class,'insert'])->name('add-recipe');
Route::get('/get-all-recipes',[RecipeController::class,'getRecipes']);
Route::post('/delete-recipe',[RecipeController::class,'delete'])->name('recipe.destroy');
Route::post('/update-recipe',[RecipeController::class,'update']);
Route::get('/get-recipe/{id}',[RecipeController::class,'getRecipe'])->name('recipe.edit');
