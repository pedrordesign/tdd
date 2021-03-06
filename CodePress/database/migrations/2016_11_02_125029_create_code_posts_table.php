<?php

use CodePress\CodePost\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepress_posts', function (Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->integer('state')->default(Post::STATE_DRAFT);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('codepress_posts');
    }
}
