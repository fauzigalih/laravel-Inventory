<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    public $namePage = 'Transaction';

    protected $fillable = [
        'invoice',
        'user_id',
        'code_trx',
        'stock_first',
        'qty_trx',
        'stock_final'
    ];

    public static function validateData(Request $request)
    {
        $request->validate([
            'invoice' => 'required|size:6|unique:products,invoice|string',
            'code_trx' => 'required|string',
            'stock_first' => 'required|integer',
            'qty_trx' => 'required|integer',
            'stock_final' => 'required|integer',
        ]);
    }

    public static function invoiceData() {
        $query = self::max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "TRX";
        $newInvoice = $charInvoice . sprintf("%03s", $noInvoice);

        return $newInvoice;
    }

    public static function saveTransaction($invoice, $productId, $qtyTrx, $update = false)
    {
        $product = Product::findOrFail($productId);
        return self::updateOrCreate([
            'code_trx' => $invoice
        ], array_merge([
            'code_trx' => $invoice,
            'user_id' => Auth::user()->id,
            'stock_first' => $product->stock_first,
            'qty_trx' => $qtyTrx,
            'stock_final' => $product->stock_final,
        ], $update ? [] : ['invoice' => self::invoiceData()]));
    }

    public function productIn()
    {
        return $this->hasOne('App\ProductIn', 'invoice', 'code_trx');
    }
    
    public function productOut()
    {
        return $this->hasOne('App\ProductOut', 'invoice', 'code_trx');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
