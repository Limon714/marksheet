<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


Route::post('/add-category',[CategoryController::class,'insert'])->name('add-category');
Route::get('/get-all-categories',[CategoryController::class,'getCategories']);
Route::post('/delete-category',[CategoryController::class,'delete'])->name('category.destroy');
Route::post('/update-category',[CategoryController::class,'update']);
Route::get('/get-category/{id}',[CategoryController::class,'getCategory'])->name('category.edit');
