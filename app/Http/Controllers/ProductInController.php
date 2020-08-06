<?php

namespace App\Http\Controllers;

use App\ProductIn;
use Illuminate\Http\Request;

class ProductInController extends Controller
{
    const NAME_PAGE = "Product In";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = ProductIn::all();
        $namePage = self::NAME_PAGE;
        return view('product-in.index', compact('model', 'namePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function show(ProductIn $productIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductIn $productIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductIn $productIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductIn $productIn)
    {
        //
    }
}
