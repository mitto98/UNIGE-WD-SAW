<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('site');
    }

    public function sendNewsletter()
    {
        $users = User::where('email', 'NOT LIKE', '%example%')->get();
        foreach ($users as $user) {
            Mail::to($user)->send(new Newsletter($user));
        }
        return response()->json();
    }
}
