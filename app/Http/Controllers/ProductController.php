<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Product();
        return view('product.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Product();
        return view('product.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::validateData($request);

        $fileName = date('dmy.His').'_'.$request->invoice.'.'.$request->image_product->extension();
        $request->image_product->move(public_path('images'), $fileName);
        Product::create(array_merge($request->all(), ['stock_final' => $request->stock_first, 'image_product' => $fileName]));
        return redirect('product')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::findOrFail($id);
        return view('product.view', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);
        return view('product.update', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::validateData($request);

        $product = Product::findOrFail($id);
        $invoice = $product->invoice;
        $stock_final = $request->stock_first + $product->stock_in - $product->stock_out;

        if ($request->image_product == null || $request->image_product == '') {
            $fileName = $product->image_product;
        }else{
            if (file_exists(public_path('images/'.$product->image_product))) unlink(public_path('images/'.$product->image_product));
            $fileName = date('dmy.His').'_'.$invoice.'.'.$request->image_product->extension();
            $request->image_product->move(public_path('images'), $fileName);
        }

        Product::updateOrCreate(compact('id', 'invoice'), array_merge($request->all(), ['stock_final' => $stock_final, 'image_product' => $fileName]));
        return redirect('product')->with('warning', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('product')->with('danger', 'Data Berhasil Dihapus!');
    }
}
