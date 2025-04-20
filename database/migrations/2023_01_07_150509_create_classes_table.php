<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Classes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('name',array_column(Classes::cases(),'value'))->nullable()->unique();
            $table->string('abbrev',3)->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name','abbrev']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
