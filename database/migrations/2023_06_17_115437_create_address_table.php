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
        Schema::create('address', function (Blueprint $table) {
            $table->id('id_address');
            $table->unsignedBigInteger('id_user')->nullable();

            $table->string('street_name', 150);
            $table->string('subdistrict', 100);
            $table->string('zip_code', 20);
            $table->string('city', 100);
            $table->string('province', 100);

            $table->boolean('status')->default(false);

            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
};
