<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const NAME = 'product';
    public $namePage;

    public function __construct()
    {
        $this->namePage = ucwords(str_replace('_', ' ', Product::NAME));
    }

    public $index = self::NAME . '.index';
    public $create = self::NAME . '.create';
    public $store = self::NAME . '.store';
    public $show = self::NAME . '.show';
    public $edit = self::NAME . '.edit';
    public $update = self::NAME . '.update';

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
}
