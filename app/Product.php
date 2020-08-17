<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $namePage = 'Product';

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
        $query = self::max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "INV";
        $newInvoice = $charInvoice . sprintf("%03s", $noInvoice);

        return $newInvoice;
    }

    public function fileUpload($request, $field){
        if ($request->hasFile($field)) {
            $path = $request->file($field);
            $name = $request->file($field)->getClientOriginalName();
            $extension = $request->file($field)->extension();
            $nameFile = time() . '_' . $name . '.' . $extension;
            return $path->move(public_path('images'), $nameFile);
        }
        return false;
    }
}
