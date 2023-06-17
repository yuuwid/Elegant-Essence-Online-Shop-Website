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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id('id_delivery');

            $table->unsignedInteger('id_expedition');
            $table->string('recipient_name');
            $table->unsignedBigInteger('id_address');

            $table->foreign('id_expedition')->references('id_expedition')->on('expeditions')->onDelete('restrict');
            $table->foreign('id_address')->references('id_address')->on('address')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
