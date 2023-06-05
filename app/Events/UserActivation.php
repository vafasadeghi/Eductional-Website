<?php

namespace App\Events;

use App\Models\ActivationCode;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActivation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


   public $user;
   public $activationCode;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
//        dd(ActivationCode::createCode($user)->code);
       $this->user = $user;
       $this->activationCode = ActivationCode::createCode($user)->code;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
