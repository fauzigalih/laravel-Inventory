<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    const NAME_PAGE = "Product";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Product::all()->sortBy('invoice');
        $namePage = self::NAME_PAGE;
        return view('product.index', compact('model', 'namePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $namePage = "Create " . self::NAME_PAGE;
        $model = new Product();
        return view('product.create', compact('namePage', 'model'));
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
            'name_product' => 'required|string',
            'type_product' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|integer',
            'stock_first' => 'required|integer',
            'stock_in' => 'required|integer',
            'stock_out' => 'required|integer',
            'stock_final' => 'required|integer',
            'image_product' => 'required',
            'active' => 'required|integer',
        ]);

        Product::create($request->all());
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
        $namePage = "View " . self::NAME_PAGE;
        $model = Product::findOrFail($id);
        return view('product.view', compact('namePage', 'model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $namePage = "Update " . self::NAME_PAGE;
        $model = Product::findOrFail($id);
        return view('product.update', compact('namePage', 'model'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('danger', 'Data Berhasil Dihapus!');
    }
}
