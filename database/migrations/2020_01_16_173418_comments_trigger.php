<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER update_rating
        AFTER INSERT
        ON `comments` FOR EACH ROW
            BEGIN
                UPDATE courses AS c SET c.average_rating =
                (SELECT AVG(comments.rating) FROM comments
                  WHERE comments.course_id = c.id
                  GROUP BY comments.course_id LIMIT 1)
                WHERE c.id = NEW.course_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
