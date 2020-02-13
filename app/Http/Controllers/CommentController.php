<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Course $course) {
          return response()->json($course->comments);
    }

    public function put (Request $request, Course $course) {
        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $comment->user = $request->input('user');
        $course->comments()->save($comment);
    }
}
