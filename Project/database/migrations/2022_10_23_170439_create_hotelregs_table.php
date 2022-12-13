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
        Schema::create('hotelregs', function (Blueprint $table) {
            $table->id();
            $table->string('Hotel_Name');
            $table->string('Email');
            $table->string('Password');
            $table->string('Role');
            $table->string('Type');
            $table->string('Place');
            $table->string('Address');
            $table->string('Phone_Number');
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
        Schema::dropIfExists('hotelregs');
    }
};
