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
        Schema::create('banner_slideshow_translations', function (Blueprint $table) {
            $table->id();

            $table->integer('banner_slideshow_id')->unsigned();
            $table->string('locale', 255);

            $table->string('title', 255);
            $table->string('sub_title',1000)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_slideshow_translations');
    }
};
