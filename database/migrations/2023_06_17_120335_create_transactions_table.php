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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaction');

            $table->unsignedBigInteger('id_user')->nullable();

            $table->unsignedBigInteger('id_delivery');
            $table->unsignedSmallInteger('id_payment');

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
            $table->foreign('id_delivery')->references('id_delivery')->on('deliveries')->onDelete('restrict');
            $table->foreign('id_payment')->references('id_payment')->on('payments')->onDelete('restrict');

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
        Schema::dropIfExists('transactions');
    }
};
