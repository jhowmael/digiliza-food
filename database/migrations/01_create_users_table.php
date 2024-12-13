<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('type', 16);
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->string('phone', 16)->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('status', 16);
            $table->rememberToken();
            $table->date('birthday')->nullable();
            $table->dateTime('registered');
            $table->dateTime('deleted')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
