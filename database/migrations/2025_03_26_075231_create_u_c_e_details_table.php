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
        Schema::create('UCEDetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique();
            $table->string('SchName');
            $table->string('StdIndex');
            $table->string('UCEYear');
            $table->string('subj');
            $table->string('subjGrades');
            $table->unsignedBigInteger('Aggs');
            $table->string('DIV',3);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_c_e_details');
    }
};
