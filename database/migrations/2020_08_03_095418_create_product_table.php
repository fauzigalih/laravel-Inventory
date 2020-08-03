<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 50);
            $table->string('nameProduct');
            $table->string('typeProduct', 50);
            $table->string('unit', 50);
            $table->integer('price');
            $table->integer('stockFirst');
            $table->integer('stockIn');
            $table->integer('stockOut');
            $table->integer('stockFinal');
            $table->string('imageProduct');
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
        Schema::dropIfExists('product');
    }
}
