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
        Schema::create('adopt', function (Blueprint $table) {
            $table->id();
            $table->string('animal_name');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('shelter_address');
            $table->integer('age')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',['available','adopted'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adopt');
    }
};
