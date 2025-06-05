<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('education_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->string('source_url')->nullable();
            $table->string('source_name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('category');
            $table->boolean('is_featured')->default(false);
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('education_news');
    }
}; 