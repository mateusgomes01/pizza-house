<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders/pizzas', 'PizzaController@index')->name('pizzas.index')->middleware('auth'); // ->middleware requires auth to show this route
Route::get('/orders/pizzas/create', 'PizzaController@create')->name('pizzas.create'); // must come before id route so that create isn't treated as an id
Route::post('/pizzas', 'PizzaController@store')->name('pizzas.store');
Route::get('/pizzas/{id}', 'PizzaController@show')->name('pizzas.show')->middleware('auth');;
Route::delete('/pizzas/{id}', 'PizzaController@destroy')->name('pizzas.destroy')->middleware('auth');;

Auth::routes([
    'register' => false // this disable register routes so that only staff members can login
]); // generates routes behind the scene for Auth views

Route::get('/home', 'HomeController@index')->name('home'); // -> name() method allows routes to be referenced by name instead of url