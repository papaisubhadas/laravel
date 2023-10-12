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
        Schema::create('car_inquiries', function (Blueprint $table) {
            $table->id();

            $table->integer('car_type_id')->nullable();
            $table->integer('car_id')->nullable();
            $table->string('customer_name', 255);
            $table->string('customer_email', 255);
            $table->string('customer_phone_no', 255);
            $table->enum('whatsapp_enable', ['yes', 'no'])->default('no');
            $table->datetime('start_booking_date')->nullable();
            $table->datetime('end_booking_date')->nullable();
            $table->enum('status', ['Pending', 'Under Review', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_inquiries');
    }
};
