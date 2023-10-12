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
        Schema::create('car_offers', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id')->unsigned();
            $table->enum('deal_type', ['Daily', 'Weekly', 'Monthly']);
            $table->string('title', 191);
            $table->string('sub_title', 191);
            $table->text('call_to_action');
            $table->enum('offer_type', ['percentage', 'fixed_amount']);
            $table->decimal('offer_value', 10,2);
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
            $table->date('offer_start_date');
            $table->date('offer_end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_offers');
    }
};
