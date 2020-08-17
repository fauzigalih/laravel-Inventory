<?php

namespace App;

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
}
