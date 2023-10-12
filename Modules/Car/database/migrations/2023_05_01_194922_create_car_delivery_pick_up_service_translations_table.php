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
        Schema::create('car_delivery_pick_up_service_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('car_delivery_pick_up_service_id')->unsigned();
            $table->string('locale', 255);
            $table->string('service_title', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_delivery_pick_up_service_translations');
    }
};
