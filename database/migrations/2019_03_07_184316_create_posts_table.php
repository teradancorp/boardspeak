<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

/*

 title = models.CharField(max_length=50, default='')
    description = models.TextField(max_length=1000, default='')
    image_attachment = models.ImageField(upload_to=post_img_directory_path, default='', blank=True)
    link_attachment = models.CharField(max_length=150, default='')
    file_attachment = models.FileField(upload_to=post_file_directory_path, default='', blank=True)
    permalink = models.CharField(max_length=150, default='')
    topic = models.ForeignKey('board.BoardTopic', on_delete=models.CASCADE, default='', related_name='board_topic_post')
    board = models.ForeignKey('board.Board', on_delete=models.CASCADE, default='', related_name='board_post')
    type = models.CharField(max_length=15, default='non-event')
    created_by = models.ForeignKey(Person, on_delete=models.CASCADE, default=None, blank=True, null=True)
*/
            $table->increments('id');
            $table->string('post_id_link', 30);
            $table->string('post_title', 50);
            $table->string('post_description');
            $table->string('post_image', 100)->nullable()->default(null);
            $table->string('post_link')->nullable()->default(null);
            $table->string('post_file', 100)->nullable()->default(null);
            $table->string('post_permalink', 150)->nullable()->default(null);
            $table->unsignedInteger('board_id');
            $table->string('post_type', 50)->default('non-event');
            $table->unsignedInteger('author_id');

            $table->unsignedInteger('post_topic');
            $table->string('post_topic_display', 30);
            $table->tinyInteger('is_public')->default(1);
            $table->dateTime('created_date')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('board_id')->references('id')->on('boards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
