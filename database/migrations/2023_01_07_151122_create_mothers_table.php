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
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('name');
            $table->string('spousename')->nullable();
            $table->string('mobile',15);
            $table->string('email',30)->nullable();
            $table->string('telephone',15)->nullable();
            $table->unsignedBigInteger('idType_id')->nullable();
            $table->string('idnumber',15)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->string('district',20)->nullable();
            $table->string('city',15)->nullable();
            $table->string('province',20)->nullable();
            $table->string('county',20)->nullable();
            $table->string('subcounty',20)->nullable();
            $table->string('parish',20)->nullable();
            $table->unique(['student_id','mobile']);
            $table->string('avatar',2048)->nullable();
            $table->text('address',500)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idType_id')->references('id')->on('identities')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};
