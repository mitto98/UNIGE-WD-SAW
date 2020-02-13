<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get(Course $course) {
      return response()->json($course);
    }
}
