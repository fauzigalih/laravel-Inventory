<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIn;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new ProductIn();
        return view('product-in.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ProductIn();
        return view('product-in.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductIn::validateData($request);
        Product::updateStock($request->product_id, $request->qty_in);
        ProductIn::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        Transaction::saveTransaction($request->invoice, $request->product_id, $request->qty_in);
        return redirect('product-in')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function show(ProductIn $productIn)
    {
        $model = ProductIn::findOrFail($productIn->id);
        return view('product-in.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductIn $productIn)
    {
        $model = ProductIn::findOrFail($productIn->id);
        return view('product-in.update', compact('model'));
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
        ProductIn::validateData($request);
        $model = ProductIn::findOrFail($productIn->id);
        $id = $model->id;
        $invoice = $model->invoice;
        Product::updateStock($model->product_id, $model->qty_in, $request->product_id, $request->qty_in);
        ProductIn::updateOrCreate(compact('id', 'invoice'), array_merge($request->all(), ['user_id' => Auth::user()->id]));
        Transaction::saveTransaction($invoice, $request->product_id, $request->qty_in, true);
        return redirect('product-in')->with('warning', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductIn  $productIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductIn $productIn)
    {
        $model = ProductIn::findOrFail($productIn->id);
        ProductIn::destroy($model->id);
        return redirect('product-in')->with('danger', 'Data Berhasil Dihapus!');
    }
}
