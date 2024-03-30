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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
//            $table->tinyInteger('blog_category_id')->nullable();
            $table->foreignId('blog_category_id')->nullable()->index();
            $table->string('title_slug')->nullable();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('excerpt1')->nullable();
            $table->string('excerpt2')->nullable();
            $table->string('tags')->nullable();
            $table->string('likes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
