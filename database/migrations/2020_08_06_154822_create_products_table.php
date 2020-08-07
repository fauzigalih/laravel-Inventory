<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 50);
            $table->string('name_product');
            $table->string('type_product', 50);
            $table->string('unit', 50);
            $table->integer('price');
            $table->integer('stock_first');
            $table->integer('stock_in');
            $table->integer('stock_out');
            $table->integer('stock_final');
            $table->string('image_product');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
