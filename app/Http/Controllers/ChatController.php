<?php

namespace App\Http\Controllers;

use App\Events\SentMessage;
use App\Events\SentPrivateMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index() {
        return view('chats.show');
    }

    public function messageReceive(Request $request) {
        $rules = [
        ];
        $request->validate($rules);

       $data = [];
       $data['message'] = $request->message;
       $data['channel'] = 'chats';
       $data['sender_id'] = $request->user()->id;
       $data['created_at'] = $request->time;

        Message::create($data);

       broadcast(new SentMessage($request->user(), $request->message));

       return response()->json("Message Broadcasts");
    }

    public function messagePrivateReceive(Request $request,User $receiver) {
        $rules = [
        ];
        $request->validate($rules);

        $data = [];
        $data['message'] = $request->message;
        $data['channel'] = 'chats/'.$request->user()->id.'/'.$receiver->id.'';
        $data['sender_id'] = $request->user()->id;
        $data['receive_id'] = $receiver->id;
        $data['created_at'] = $request->time;

        Message::create($data);

        broadcast(new SentPrivateMessage($request->user(),$request->receiver_id, $request->message));

        return response()->json("Private Message Broadcasts");
    }

    public function chatUser(Request $request, User $receiver) {
        $sender = User::find($request->user()->id);
        $receiver = User::find($receiver->id);
//        $mess = Message::where('channel', 'chats/'.$id.'/'.$receive_id.'')->get();

        return response()->json([
            'sender' => $sender,
            'receiver' => $receiver,
//            'message' => $mess,
        ]);
    }
}
