<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SentPrivateMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $receiver_id;
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, $receiver_id, $message)
    {
        $this->user = $user;
        $this->message = $message;
        $this->receiver_id = $receiver_id;
    }

    public function broadcastOn()
    {
        \Log::debug("SentPrivateMessage", ["user" => $this->user, "sender_id" => $this->receiver_id, "message" => $this->message]);
        return new PrivateChannel('chats.private.'.$this->user->id);
    }
}
