<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (!Schema::hasTable('posts')) {
            // Table already exists, perform any necessary actions here
            Schema::create('posts', function (Blueprint $table) {
                $table->bigIncrements('id')->unsigned();
               // $table->string('name');
                $table->string('slug')->nullable();
               // $table->text('intro')->nullable();
               // $table->text('content')->nullable();
                $table->string('type')->nullable();
                $table->integer('category_id')->unsigned()->nullable();
                $table->string('category_name')->nullable();
                $table->integer('is_featured')->nullable();
               // $table->string('featured_image')->nullable();

                $table->string('meta_title')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->text('meta_description')->nullable();
                $table->string('meta_og_image')->nullable();
                $table->string('meta_og_url')->nullable();

                $table->integer('hits')->default(0)->unsigned();
                $table->integer('order')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');

                $table->integer('moderated_by')->unsigned()->nullable();
                $table->datetime('moderated_at')->nullable();

                $table->integer('created_by')->unsigned()->nullable();
                $table->string('created_by_name')->nullable();
                $table->string('created_by_alias')->nullable();
                $table->integer('updated_by')->unsigned()->nullable();
                $table->integer('deleted_by')->unsigned()->nullable();

                $table->timestamp('published_at')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
        if (!Schema::hasTable('posts')) {
        Schema::dropIfExists('posts');
        }
    }
}
