<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentrepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentreplies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reply_text');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('author_id');
            $table->string('author_username', 50);
            $table->dateTime('created_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('comment_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentreplies');
    }
}
