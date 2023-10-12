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
        Schema::create('car_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id')->unsigned();
            $table->string('locale', 255);
            $table->string('name', 255);
            $table->string('custom_title', 255);
            $table->text('description')->nullable();
            $table->text('supplier_note')->nullable();
            $table->string('delivery', 255);
            $table->string('insurance', 255);
            $table->text('faq')->nullable();

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_translations');
    }
};
