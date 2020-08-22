<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\ProductIn;
use App\ProductOut;
use App\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::count();
        $productIn = ProductIn::count();
        $productOut = ProductOut::count();
        $transaction = Transaction::count();
        return view('user.index', compact('product', 'productIn', 'productOut', 'transaction'));
    }
}
