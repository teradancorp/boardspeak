<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('username', 50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable()->default(null);
            $table->string('location', 100)->nullable()->default(null);
            $table->unsignedInteger('rights')->default(0);
            $table->string('avatar')->default('user.jpg');
            $table->string('loc_city', 50);
            $table->string('loc_country', 50);
            $table->string('loc_cny_code', 5);
            $table->string('occupation', 50)->nullable()->default(null);
            $table->dateTime('birthday')->default(now());
            $table->string('gender', 10);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
