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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('car_brand_id')->unsigned();
            $table->integer('car_type_id')->unsigned();
           // $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('custom_url_slug', 255);
            //$table->enum('deal_type', ['Daily', 'Weekly', 'Monthly']);
          //  $table->text('description')->nullable();
           // $table->text('supplier_note')->nullable();
            $table->integer('car_model_year');
           // $table->string('delivery', 255);
           // $table->string('insurance', 255);
            $table->decimal('deposit', 10,2);
            //$table->integer('kms');
            $table->integer('min_age');
            $table->decimal('daily_price', 10,2)->nullable();
            $table->decimal('weekly_price', 10,2)->nullable();
            $table->decimal('monthly_price', 10,2)->nullable();
            $table->integer('daily_mileage_limit');
            $table->integer('weekly_mileage_limit');
            $table->integer('monthly_mileage_limit');
            $table->enum('is_available', ['yes', 'no'])->default('yes');
            //$table->enum('is_most_rented', ['yes', 'no'])->default('no');
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
