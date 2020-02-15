<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class TestController extends Controller
{
    public function registration(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'firstname' => 'required|min:4',
            'lastname' => 'required|min:4',
            'pass' => 'required|same:confirm',
            'confirm' => 'required|same:pass'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response('Registration failed: data error', 404);
        }

        $user = new User();
        $user->registration_number = Str::random(8);
        $user->name = $request->input('firstname') . ' ' . $request->input('lastname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('pass'));

        $user->save();
        return response('Ok', 200);
    }

    public function login(Request $request)
    {
        $rules = ['email' => 'required|email', 'pass' => 'required|min:8'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response('Login failed: data error', 401);
        }

        $email = $request->input('email');
        $pass = $request->input('pass');

        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            $user = Auth::user();
            $request->session()->put('user_id', $user->id);
            $request->session()->put('email', $user->email);
            $request->session()->put('name', $user->name);
            $request->session()->regenerate();
            return response('Ok', 200);
        } else {
            return response('Login failed', 401);
        }
    }

    public function showProfile(Request $request)
    {
        if (Auth::check()) {
            return response("Email: " . $request->session()->get('email') . "\nName: " . $request->session()->get('name'));
        } else {
            return response("Ehi cosa stai facendo?", 401);
        }
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'firstname' => 'required|min:4',
            'lastname' => 'required|min:4'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response('Update profile failed: data error', 404);
        }

        if (Auth::check()) {
            $firsname = $request->input('firstname');
            $lastname = $request->input('lastname');

            $user = Auth::user();

            $user->name = $firsname.' '.$lastname;
            $user->save();

            $request->session()->put('name', $user->name);
            $request->session()->regenerate();
            return response('Ok', 200);
        } else {
            return response("Ehi cosa stai facendo?", 401);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->flush();
        return response('Ok', 200);
    }
}
