<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{

    public function getMessages(User $user, Request $request)
    {
        /*
        $messages = DB::table('messages')->where('sender_id', Auth::user()->id)
            ->orderBy('created_at', 'desc'); */

        $messages = Message::where([['sender_id', $request->user()->id],['receiver_id', $user->id]])
            ->orWhere([['receiver_id', $request->user()->id],['sender_id', $user->id]])
            ->orderBy('created_at', 'asc')->get();

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
        $newMessage->receiver()->associate(User::findOrFail($request->input('receiver_id')));
        $newMessage->save();

        return response()->json($newMessage);
    }


    public function delete(Message $message)
    {
        $message->delete();
        return response()->json();
    }


}
