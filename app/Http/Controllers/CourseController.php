<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get(Course $course) {
      return response()->json($course);
    }

    public function getRatings(Course $course)
    {
        $comments = $course->comments();
        $allComments = count($comments);
        $return = [
            ["rating" => 1, "rating_count"=> 0 , "rating_percentage"=>0],
            ["rating" => 2, "rating_count"=> 0 , "rating_percentage"=>0],
            ["rating" => 3, "rating_count"=> 0 , "rating_percentage"=>0],
            ["rating" => 4, "rating_count"=> 0 , "rating_percentage"=>0],
            ["rating" => 5, "rating_count"=> 0 , "rating_percentage"=>0],
        ];
        for($i = 1; $i <= $allComments; $i++)
            $return[$comments[$i]]->rating_count++;
        for($i = 1; $i <= 5; $i++)
            $return[$i]->rating_percentage = $return[$i]->rating_count/$allComments;

        return $return;
    }
}
