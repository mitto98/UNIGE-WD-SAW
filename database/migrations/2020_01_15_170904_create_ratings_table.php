<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('ratings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title', 128);
      $table->text('text');
        $table->integer('rating')->unsigned();
      $table->unsignedBigInteger('course_id');
      $table->unsignedBigInteger('user_id');
      $table->timestamps();

      $table->foreign('course_id')->references('id')->on('courses');
      $table->foreign('user_id')->references('id')->on('users');

    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('ratings');
  }
}
