<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { return redirect('en'); });
Route::get('{locale}/', function ($locale) {
    App::setLocale($locale);
    return view('welcome');
});

// Route::resource('{locale}/food', 'FoodController');

// Route::get('{locale}/search', 'SearchController@filter');
