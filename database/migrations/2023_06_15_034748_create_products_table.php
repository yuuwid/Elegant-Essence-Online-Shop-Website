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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('product_name', 200);
            $table->string('slug_product', 220)->unique();
            $table->text('description')->nullable();

            $table->unsignedSmallInteger('id_brand')->nullable();
            $table->unsignedSmallInteger('id_category')->nullable();

            $table->timestamps();

            $table->foreign('id_brand')->references('id_brand')->on('brands')->onDelete('set null');
            $table->foreign('id_category')->references('id_category')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
};
