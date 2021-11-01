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
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('format_id')->unsigned()->index();
            $table->integer('team_number_id')->unsigned()->index();
            $table->integer('size_id')->unsigned()->index();
            $table->integer('team_gender_id')->unsigned()->index();
            $table->datetime('time');
            $table->text('note')->nullable();
            $table->string('formatted_address');
            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
