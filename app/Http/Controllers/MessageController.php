<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{

    public function getMessages(User $receiver)
    {
        /*
        $messages = DB::table('messages')->where('sender_id', Auth::user()->id)
            ->orderBy('created_at', 'desc'); */

        $messages = Message::where('sender_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')->get();

        return response()->json($messages);
    }

    public function create(Request $request)
    {
        $request->validate([
            'text' => 'required',
        ]);

        $newMessage = new Message();
        $newMessage->text = $request->input('text');
        $newMessage->sender_id = Auth::user()->id;
        $newMessage->user()->associate(User::findOrFail($request->input('receiver_id')));
        $newMessage->save();

        return response()->json($newMessage);
    }


    public function delete(Message $message)
    {
        $message->delete();
        return response()->json();
    }


}
