<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('user_id');  
            $table->unsignedBigInteger('food_table_id'); 
            $table->integer('occupation');  
            $table->dateTime('entry');  
            $table->dateTime('finished');  
            $table->dateTime('canceled');  
            $table->string('status')->nullable(); 

            $table->timestamps();  

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('food_table_id')->references('id')->on('food_tables')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};