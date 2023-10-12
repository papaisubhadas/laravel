<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Schema::table('car_rental_include_translations', function (Blueprint $table) {
                $table->unsignedBigInteger('car_rental_include_id')->change();
                $table->foreign('car_rental_include_id')
                    ->references('id')
                    ->on('car_rental_includes')
                    ->onDelete('cascade');
                });
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_rental_include_translations', function (Blueprint $table) {
            $table->dropForeign('car_rental_include_translations_car_rental_include_id_foreign');
        });
    }
};
