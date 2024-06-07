<?php

use Illuminate\Support\Facades\Route;
use DB;

Route::get('/', function () {
    $categories=DB::table('categories')->get();
    $recipes=DB::table('recipes')->get();
    //dd($datas);
    return view('welcome', compact('categories','recipes'));
});
