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
        Schema::create('transactions_track', function (Blueprint $table) {
            $table->unsignedBigInteger('id_transaction')->nullable();
            $table->unsignedTinyInteger('id_status_transaction')->nullable();

            $table->dateTime('handle_at')->useCurrent();

            $table->foreign('id_transaction')->references('id_transaction')->on('transactions')->onDelete('set null');
            $table->foreign('id_status_transaction')->references('id_status_transaction')->on('status_transactions')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_status');
    }
};
