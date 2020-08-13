<?php

use Illuminate\Routing\Route as RoutingRoute;
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
Route::get('/', 'PageController@index');
Route::get('/signin', 'PageController@signin');
Route::get('/signup', 'PageController@signup');

// Route::get('/product', 'ProductController@index');
// Route::get('/product/create', 'ProductController@create');
// Route::get('/product/{product}', 'ProductController@show');
// Route::post('/product', 'ProductController@store');
// Route::put('product/{product}', 'ProductController@update');
// Route::delete('product/{product}', 'ProductController@destroy');

Route::resource('product', 'ProductController');
// Route::get('/product/update/{product}', 'ProductController@edit');

Route::get('/product-in', 'ProductInController@index');

Route::get('forms', function () {
    return view('pages.forms');
});

Route::get('table', function () {
    return view('pages.data-table');
});