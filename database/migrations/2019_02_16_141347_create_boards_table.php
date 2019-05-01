<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('board_id_link', 30);
            $table->string('board_title', 100);
            $table->string('board_description');
            $table->tinyInteger('board_title_hide')->default(0);
            $table->tinyInteger('board_description_hide')->default(0);
            $table->string('board_text_position', 15);
            $table->string('board_text_color', 20)->default('FFFFFF');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('board_main_category');
            $table->string('board_main_category_display', 30);
            $table->string('board_cover_img', 100)->default(null);
            $table->string('board_bg_color', 20)->default('FFFFFF');
            $table->tinyInteger('board_cover_type')->default(0);
            $table->string('board_type', 20);
            $table->string('board_type_specify', 50)->nullable()->default(null);
            $table->string('board_accessibility', 20);
            $table->string('board_accessibility_location', 50)->nullable()->default(null);
            $table->tinyInteger('is_public')->default(1);
            $table->tinyInteger('board_access')->default(1);
            $table->unsignedInteger('board_contributors');
            $table->unsignedInteger('board_comments');
            $table->dateTime('created_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
