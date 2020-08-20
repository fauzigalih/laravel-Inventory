<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductIn extends Model
{
    public $namePage = 'Product In';

    protected $fillable = [
        'invoice',
        'user_id',
        'product_id',
        'qty_in'
    ];

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
