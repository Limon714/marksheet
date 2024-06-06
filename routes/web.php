<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;


// category route

Route::resource('categories', CategoryController::class);
Route::get('categories/{category}/subcategories', [SubCategoryController::class,'subcategories'])->name('categories.subcategories');
Route::resource('subcategories', SubCategoryController::class);
Route::get('subcategories/{subCategory}/subsubcategories', [SubSubCategoryController::class,'subsubcategories'])->name('subcategories.subsubcategories');
Route::resource('subsubcategories', SubSubCategoryController::class);
Route::get('viewcategory',[CategoryController::class,'viewcategory']);

