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
        Schema::table('car_brand_translations', function (Blueprint $table) {
            $table->string('custom_title', 255)->nullable()->after('faq');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_brand_translations', function (Blueprint $table) {
            $table->dropColumn('custom_title');
        });
    }
};
