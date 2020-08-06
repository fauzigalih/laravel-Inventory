<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function index(){
        $model = Product::all();
        return view('pages.index', compact('model'));
    }

    public function signin(){
        return view('pages.signin');
    }

    public function signup(){
        return view('pages.signup');
    }
}
