<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductIn extends Model
{
    public $namePage = 'Product In';

    protected $fillable = [
        'invoice',
        'user_id',
        'product_id',
        'qty_in'
    ];

    public static function validateData(Request $request)
    {
        $update = Route::currentRouteName() === 'product-in.update';
        $request->validate(array_merge([
            'invoice' => 'required|size:6|unique:products,invoice|string',
            'product_id' => 'required|integer',
            'qty_in' => 'required|integer',
        ], $update ? ['invoice' => 'required|size:6|string'] : []));
    }

    public function invoiceData() {
        $query = self::max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "PIN";
        $newInvoice = $charInvoice . sprintf("%03s", $noInvoice);

        return $newInvoice;
    }

    public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id')->withTrashed();
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
