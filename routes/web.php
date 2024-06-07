<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use DB;

Route::get('/', function () {

        $categories=DB::table('categories')->get();
        $recipes=DB::table('recipes')->get();
    return view('welcome', compact('categories','recipes'));
});

Route::post('/search', function (Request $request) {
   
        $data = $request->all();
        $recipes = DB::table('recipes')
            ->where('category_id', $data['category_id'])
            ->orWhere('title', 'LIKE', "%".$data['searchRecipe']."%")
            ->get();
        $categories=DB::table('categories')->get();
    return view('welcome', compact('categories','recipes'));
});

