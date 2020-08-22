<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    public $namePage = 'Product Out';

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

    public function invoiceData() {
        $query = self::max('invoice');
        $noInvoice = (int) substr($query, 3, 3);
        $noInvoice++;
        $charInvoice = "TRX";
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
