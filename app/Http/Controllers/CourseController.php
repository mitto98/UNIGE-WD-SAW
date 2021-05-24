<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get(Course $course)
    {
        return response()->json($course);
    }

    public function getRatings(Course $course)
    {
        $total = $course->comments->count();

        $return = [
            [
                "rating" => 1,
                "count" => $course->comments()->where('rating', 1)->count()
            ],
            [
                "rating" => 2,
                "count" => $course->comments()->where('rating', 2)->count()
            ],
            [
                "rating" => 3,
                "count" => $course->comments()->where('rating', 3)->count()
            ],
            [
                "rating" => 4,
                "count" => $course->comments()->where('rating', 4)->count()
            ],
            [
                "rating" => 5,
                "count" => $course->comments()->where('rating', 5)->count()
            ],
        ];

        for ($i = 0; $i < 5; $i++) {
            if ($total == 0)
                $return[$i]['percentage'] = 0;
            else
                $return[$i]['percentage'] = $return[$i]['count'] * 100 / $total;
        }

        return $return;
    }
}
