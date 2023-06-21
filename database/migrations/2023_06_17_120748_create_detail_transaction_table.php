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
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('id_product')->nullable();
            $table->unsignedBigInteger('id_transaction');

            $table->unsignedBigInteger('id_variant')->nullable();
            $table->smallInteger('qty')->default(0);
            $table->smallInteger('discount')->default(0);

            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('set null');
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions')->onDelete('restrict');
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
        Schema::dropIfExists('detail_transaction');
    }
};
