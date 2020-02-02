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
      $table->unsignedBigInteger('course');
      $table->integer('rating')->unsigned();
      $table->string('user', 8)->nullable(false);
      $table->timestamps();

      $table->foreign('course')->references('id')->on('courses');
      $table->foreign('user')->references('registration_number')->on('users');

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
