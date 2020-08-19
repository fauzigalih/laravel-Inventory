<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIn;
use App\ProductOut;
use App\Transaction;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $product = Product::count();
        $productIn = ProductIn::count();
        $productOut = ProductOut::count();
        $transaction = Transaction::count();
        return view('pages.index', compact('product', 'productIn', 'productOut', 'transaction'));
    }

    public function signin(){
        return view('pages.signin');
    }

    public function signup(){
        return view('pages.signup');
    }
}
