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
        Schema::create('std_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('condition');
            $table->string('details');
            $table->unique(['student_id','condition']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign ('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_conditions');
    }
};
