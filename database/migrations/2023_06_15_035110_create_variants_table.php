<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id('id_variant');

            $table->unsignedBigInteger('id_product');

            $table->unsignedInteger('price');
            $table->unsignedTinyInteger('discount')->default(0);

            $table->tinyInteger('stock')->default(0);

            $table->unsignedSmallInteger('id_size');
            $table->unsignedSmallInteger('id_color');

            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
            $table->foreign('id_size')->references('id_size')->on('sizes')->onDelete('cascade');
            $table->foreign('id_color')->references('id_color')->on('colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_colors');
    }
};
