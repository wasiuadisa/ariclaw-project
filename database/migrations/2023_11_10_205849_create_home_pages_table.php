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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title')->nullable();
            $table->text('banner_excerpt')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('button_title')->nullable();

            $table->string('feature_title')->nullable();
            $table->text('feature_text')->nullable();
            $table->string('feature_banner_title1')->nullable();
            $table->string('feature_banner_slogan1')->nullable();
            $table->string('feature_banner_image1')->nullable();
            $table->string('feature_banner_title2')->nullable();
            $table->string('feature_banner_slogan2')->nullable();
            $table->string('feature_banner_image2')->nullable();
            $table->string('feature_banner_title3')->nullable();
            $table->string('feature_banner_slogan3')->nullable();
            $table->string('feature_banner_image3')->nullable();

            $table->text('colour_divider_text')->nullable();
            $table->string('colour_divider_button')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
