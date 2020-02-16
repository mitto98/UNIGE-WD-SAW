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

    public function store(Request $request, Course $course)
    {
        $comment = new Comment();
        $comment->title = $request->input('title');
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $comment->user()->associate(User::findOrFail($request->input('user')));
        $course->comments()->save($comment);

        return response()->json($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $comment->title = $request->input('title');
        $comment->text = $request->input('text');
        $comment->rating = $request->input('rating');
        $comment->update();
        return response()->json($comment);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return response()->json();
    }

}
