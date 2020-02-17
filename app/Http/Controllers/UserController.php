<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'registration_number' => ['required', 'string', 'max:8', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
        ])->validate();

        $user = User::create([
            'registration_number' => $request->input('registration_number'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Mail::to($user)->send(new Registered($user));

        return response("Registered");
    }
}
