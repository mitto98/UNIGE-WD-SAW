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
            $table->string('title',128)->nullable(false);
            $table->text('text');
            $table->string('course',20)->nullable(false);
            $table->integer('rating',false,true)->nullable(true);
            $table->timestamp('create_date')->useCurrent()->nullable(false);
            $table->timestamp('update_date')->useCurrent()->nullable(false);
            $table->string('user',8)->nullable(false);

            $table->foreign('course')->references('code')->on('courses');
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
