<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

        $categories=DB::table('categories')->get();
        $recipes=DB::table('recipes')->get();
    return view('welcome', compact('categories','recipes'));
});

Route::post('/search', function (Request $request) {
   
        $data = $request->all();
        $recipes = check($data);
        $categories=DB::table('categories')->get();
    return view('welcome', compact('categories','recipes'));
});

function check($data){
    if(isset($data['category_id']) && isset($data['searchRecipe'])){
        $recipes = DB::table('recipes')
                ->where('category_id', $data['category_id'])
                ->where('title', 'LIKE', "%".$data['searchRecipe']."%")
                ->get();
    } elseif(isset($data['category_id'])){
        $recipes = DB::table('recipes')
                ->where('category_id', $data['category_id'])
                ->get();
    } elseif(isset($data['searchRecipe'])){ 
        $recipes = DB::table('recipes')
                    ->Where('title', 'LIKE', "%".$data['searchRecipe']."%")
                    ->get();
    } else{
        $recipes = [];
    }

    return $recipes;
}
