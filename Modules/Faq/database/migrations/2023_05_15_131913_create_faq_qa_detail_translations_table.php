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
        Schema::create('faq_qa_detail_translations', function (Blueprint $table) {
            $table->id();

            $table->integer('faq_qa_detail_id')->unsigned();
            $table->string('locale', 255);

            $table->string('question', 255);
            $table->text('answer');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_qa_detail_translations');
    }
};
