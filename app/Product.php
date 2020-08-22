<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesRoute;

class Product extends Model
{
    use SoftDeletes;

    public $namePage = 'Product';

    protected $attributes = [
        'stock_in' => 0,
        'stock_out' => 0
    ];

    protected $fillable = [
        'invoice',
        'name_product',
        'type_product',
        'unit',
        'price',
        'stock_first',
        'stock_in',
        'stock_out',
        'stock_final',
        'image_product',
        'active'
    ];

    public static $unitCategories = [
        'Unit' => 'Unit',
        'Pcs' => 'Pcs',
        'Dus' => 'Dus',
    ];

    public static function validateData(Request $request)
    {
        $update = FacadesRoute::currentRouteName() === 'product.update';
        $request->validate(array_merge([
            'invoice' => 'required|size:6|unique:products,invoice|string',
            'name_product' => 'required|string',
            'type_product' => 'required|string',
            'unit' => 'required|string',
            'price' => 'required|integer',
            'stock_first' => 'required|integer',
            'active' => 'required|integer',
        ], $update ? ['invoice' => 'required|size:6|string'] : ['image_product' => 'required']));
    }

    public function invoiceData() {
        $query = self::withTrashed()->max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "INV";
        $newInvoice = $charInvoice . sprintf("%03s", $noInvoice);

        return $newInvoice;
    }

    public static function updateStock($id, $stock, $newId = null, $newStock = null)
    {
        $storeProductIn = FacadesRoute::currentRouteName() === 'product-in.store';
        $updateProductIn = FacadesRoute::currentRouteName() === 'product-in.update';
        $storeProductOut = FacadesRoute::currentRouteName() === 'product-out.store';
        $updateProductOut = FacadesRoute::currentRouteName() === 'product-out.update';
        $product = self::findOrFail($id);
        $final = $product->stock_first + $product->stock_in - $product->stock_out;
        if ($storeProductIn || $storeProductOut) {
            if ($storeProductIn) {
                self::where('id', $id)->update(['stock_in' => $product->stock_in + $stock, 'stock_final' => $final += $stock]);
            }else if($storeProductOut){
                self::where('id', $id)->update(['stock_out' => $product->stock_out + $stock, 'stock_final' => $final -= $stock]);
            }
            return true;
        }else if ($updateProductIn || $updateProductOut) {
            $productNew = self::findOrFail($newId);
            $updateStock = $newStock - $stock;
            if ($updateProductIn) {
                if($id !== $newId) self::where('id', $id)->update(['stock_in' => $product->stock_in - $stock, 'stock_final' => $final -= $stock]);
                self::where('id', $newId)->update(['stock_in' => $productNew->stock_in += ($id == $newId) ? $updateStock : $newStock, 'stock_final' => $final += ($id == $newId) ? $updateStock : $newStock]);
            }else if($updateProductOut){
                if($id !== $newId) self::where('id', $id)->update(['stock_out' => $product->stock_out - $stock, 'stock_final' => $final += $stock]);
                self::where('id', $newId)->update(['stock_out' => $productNew->stock_in += ($id == $newId) ? $updateStock : $newStock, 'stock_final' => $final -= ($id == $newId) ? $updateStock : $newStock]);
            }
            return true;
        }
        
        return false;
    }

    public static function listProduct()
    {
        return self::pluck('name_product', 'id');
    }
}
