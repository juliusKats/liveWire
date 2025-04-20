<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CombinationTypes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alevel_combs', function (Blueprint $table) {
            $table->id();
            $table->string('PSubjects',100);
            $table->string('SSubjects',100);
            $table->string('Combination',30)->unique();
            $table->enum('category',array_column(CombinationTypes::cases(),'value'));
            $table->unsignedBigInteger('category_value')->nullable;
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alevel_combs');
    }
};
