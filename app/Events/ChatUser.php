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

class ChatUser implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $send_id;

    /**
     * Create a new event instance.
     */
    public function __construct(User $user, $send_id)
    {
        $this->user = $user;
        $this->send_id = $send_id;
    }

    public function broadcastOn()
    {
        return new Channel("chat.user.{$this->user->id}.{$this->send_id}");
    }
}
