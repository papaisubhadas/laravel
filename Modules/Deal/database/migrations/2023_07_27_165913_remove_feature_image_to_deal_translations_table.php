<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('deal_translations', 'feature_image')) {
            Schema::table('deal_translations', function (Blueprint $table) {
                $table->dropColumn('feature_image');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deal_translations', function (Blueprint $table) {

        });
    }
};
