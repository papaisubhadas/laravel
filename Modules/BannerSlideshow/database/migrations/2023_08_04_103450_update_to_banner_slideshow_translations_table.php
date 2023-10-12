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
        Schema::table('banner_slideshow_translations', function (Blueprint $table) {
            $table->unsignedBigInteger('banner_slideshow_id')->change();
            $table->foreign('banner_slideshow_id')
                ->references('id')
                ->on('banner_slideshows')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banner_slideshow_translations', function (Blueprint $table) {

        });
    }
};
