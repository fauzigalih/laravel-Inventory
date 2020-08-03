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
    return view('pages.index');
});

Route::get('/email', function() {
    return view('pages.email');
});

Route::get('/compose', function() {
    return view('pages.compose');
});

Route::get('/calendar', function() {
    return view('pages.calendar');
});

Route::get('/chat', function() {
    return view('pages.chat');
});

Route::get('/charts', function() {
    return view('pages.charts');
});

Route::get('/forms', function() {
    return view('pages.forms');
});

Route::get('/ui', function() {
    return view('pages.ui');
});

Route::get('/basic-table', function() {
    return view('pages.basic-table');
});

Route::get('/data-table', function() {
    return view('pages.data-table');
});

Route::get('/google-maps', function() {
    return view('pages.google-maps');
});

Route::get('/vector-maps', function() {
    return view('pages.vector-maps');
});

Route::get('/blank', function() {
    return view('pages.blank');
});

Route::get('/404', function() {
    return view('pages.404');
});

Route::get('/500', function() {
    return view('pages.500');
});

Route::get('/signin', function() {
    return view('pages.signin');
});

Route::get('/signup', function() {
    return view('pages.signup');
});