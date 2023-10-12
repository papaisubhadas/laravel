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
        Schema::create('car_rental_requirement_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('car_rental_requirement_id')->unsigned();
            $table->string('locale', 255);
            $table->string('key', 255)->nullable();
            $table->string('value', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_rental_requirement_translations');
    }
};
