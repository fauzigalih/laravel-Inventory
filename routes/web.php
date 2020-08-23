<?php

use App\Http\Controllers\TransactionController;
use App\Transaction;
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
Route::get('/', 'UserController@index');
// Route::get('/transaction', 'TransactionController@index');
// Route::delete('/transaction/{transaction}', 'TransactionController@destroy');

Route::resources([
    'product' => 'ProductController',
    'product-in' => 'ProductInController',
    'product-out' => 'ProductOutController',
    'transaction' => 'TransactionController'
]);

Auth::routes();