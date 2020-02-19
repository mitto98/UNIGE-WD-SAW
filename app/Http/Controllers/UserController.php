<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\PasswordReset;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function current(Request $request) {
        return $request->user();
    }

    public function getUsers() {
        return response()->json(User::all());
    }

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

    public function reset(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        // TODO Rimuovere, serve solo per la demo alla prof
        if ($request->input('email') == 'mail@rotta.it') {
            return response()->json([], 500);
        }

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $passwordReset = PasswordReset::updateOrCreate(
                ['email' => $user->email],
                [
                    'email' => $user->email,
                    'token' => Str::random(60)
                ]
            );
            if ($passwordReset)
                $user->notify(new PasswordResetRequest($passwordReset->token));
        }

        return response()->json(['message' => 'Controlla la tua casella di posta!']);
    }


    public function hasReset($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset)
            return response()->json(['message' => 'Token non valida'], 404);

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json(['message' => 'Token non valida'], 404);
        }

        return response()->json($passwordReset);
    }

    public function doReset(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        if (!$token)
            return response()->json(['message' => 'Token non valida'], 404);

        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset)
            return response()->json(['message' => 'Token non valida'], 404);

        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json(['message' => "L'utente non esiste"], 404);

        $user->password = Hash::make($request->input('password'));
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}
