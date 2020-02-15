<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Course;

use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Course $course)
    {
        return response()->json($course->comments);
    }

    public function put(Request $request, Course $course)
    {
        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $owner = User::findOrFail($request->input('user'));
        $comment->user = $owner->id;
        $course->comments()->save($comment);
    }

    public function delete(Request $request)
    {
        $course = Course::findOrFail($request->input('id'));
        $course->delete();
    }

    public function update(Request $request)
    {
        $comment = Comment::findOrFail($request->input('id'));
        $comment->title = $request->input('title');
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $comment->update();
    }
}
