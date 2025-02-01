<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function listMessages(Request $request) {
        $listMessage = Message::where('channel', 'chats')->get();
        return response()->json($listMessage);
    }

    public function listPrivateMessages(Request $request) {
        $listMessage = Message::where('channel', 'private')->get();
        return response()->json($listMessage);
    }

}
