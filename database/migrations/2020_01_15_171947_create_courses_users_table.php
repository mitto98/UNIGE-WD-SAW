<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',20)->nullable(false);
            $table->string('registration_number',8)->nullable(false);
            $table->boolean('finished')->default(false);

            $table->foreign('code')->references('code')->on('courses');
            $table->foreign('registration_number')->references('registration_number')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_users');
    }
}
