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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id('id_review');

            $table->string('title', 50);
            $table->text('comment');
            $table->unsignedTinyInteger('rating')->default(1);
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_product')->nullable();

            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
};
