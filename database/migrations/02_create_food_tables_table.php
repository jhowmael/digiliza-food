<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('food_tables', function (Blueprint $table) {
            $table->id();          
            $table->integer('number')->unique();  
            $table->integer('capacity');  
            $table->string('status')->nullable(); 
            $table->timestamps();  
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_tables');
    }
};
