<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductOutController extends Controller
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
        $model = new ProductOut();
        return view('product-out.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new ProductOut();
        return view('product-out.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductOut::validateData($request);
        Product::updateStock($request->product_id, $request->qty_out);
        ProductOut::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
        return redirect('product-out')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductOut  $productOut
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOut $productOut)
    {
        $model = ProductOut::findOrFail($productOut->id);
        return view('product-out.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductOut  $productOut
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductOut $productOut)
    {
        $model = ProductOut::findOrFail($productOut->id);
        return view('product-out.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductOut  $productOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOut $productOut)
    {
        ProductOut::validateData($request);
        $model = ProductOut::findOrFail($productOut->id);
        $id = $model->id;
        $invoice = $model->invoice;
        Product::updateStock($model->product_id, $model->qty_out, $request->product_id, $request->qty_out);
        ProductOut::updateOrCreate(compact('id', 'invoice'), array_merge($request->all(), ['user_id' => Auth::user()->id]));
        return redirect('product-out')->with('warning', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductOut  $productOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOut $productOut)
    {
        $model = ProductOut::findOrFail($productOut->id);
        ProductOut::destroy($model->id);
        return redirect('product-out')->with('danger', 'Data Berhasil Dihapus!');
    }
}
