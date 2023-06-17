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
        Schema::create('cart_user', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_product')->nullable();
            $table->unsignedBigInteger('id_variant')->nullable();
            $table->smallInteger('qty')->default(0);

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('set null');
            $table->foreign('id_variant')->references('id_variant')->on('variants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_user');
    }
};
