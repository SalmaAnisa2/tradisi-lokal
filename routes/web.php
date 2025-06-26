<?php

use App\Http\Controllers\AaCategoryController;
use App\Http\Controllers\AaTraditionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('welcome');
});

Route::resource('aa_categories', AaCategoryController::class);

Route::resource('aa_traditions', AaTraditionController::class);
