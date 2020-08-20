<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function invoiceData() {
        $query = self::withTrashed()->max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "INV";
        $newInvoice = $charInvoice . sprintf("%03s", $noInvoice);

        return $newInvoice;
    }

    public static function updateStock($type, $id, $stock, $actionUpdate = false, $newId = null)
    {
        $product = Product::findOrFail($id);
        if ($type == 'stock_in') {
            $final = $product->stock_first + $product->stock_in - $product->stock_out + $stock;
            self::where('id', $id)->update([$type => $stock, 'stock_final' => $final]);
            return true;
        }else if ($type == 'stock_out') {
            $final = $product->stock_first + $product->stock_in - $product->stock_out - $stock;
            return self::where('id', $id)->update([$type => $stock, 'stock_final' => $final]);
        }
        
        return false;
    }

    public static function listProduct()
    {
        return self::pluck('name_product', 'id');
    }
}
