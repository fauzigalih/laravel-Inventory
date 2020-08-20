<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductInController extends Controller
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
        $request->validate([
            'invoice' => 'required|size:6|unique:products,invoice|string',
            'product_id' => 'required|integer',
            'qty_in' => 'required|integer',
        ]);

        $product = new Product();
        $product->updateStock('stock_in', $request->product_id, $request->qty_in);
        ProductIn::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));
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
        $product = new Product();
        $product->updateStock('stock_in', $request->product_id, $request->qty_in);

        $model = ProductIn::findOrFail($productIn->id);
        $id = $model->id;
        $invoice = $model->invoice;
        ProductIn::updateOrCreate(compact('id', 'invoice'), $request->all());
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
        return redirect('product')->with('danger', 'Data Berhasil Dihapus!');
    }
}
