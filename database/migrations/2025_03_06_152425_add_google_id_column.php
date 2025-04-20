<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('users',function($table){
          $table->string('google_id')->nullable();
          $table->string('userimage')->after('name')->nullable();
          $table->foreignId('current_group_id')->nullable();
          $table->string('location')->after('userimage')->nullable();
            $table->string('confirmpassword');
            $table->string('mobile')->nullable();
            $table->boolean('verifymobile')->default('0');
            $table->string('SMSCODE')->nullable();
            $table->string('loginIP')->nullable();
            $table->dateTime('lastLogin')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
