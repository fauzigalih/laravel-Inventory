<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'UserController@home');

Route::resources([
    'product' => 'ProductController',
    'product-in' => 'ProductInController',
    'product-out' => 'ProductOutController',
    'transaction' => 'TransactionController',
    'user' => 'UserController'
]);

Auth::routes();