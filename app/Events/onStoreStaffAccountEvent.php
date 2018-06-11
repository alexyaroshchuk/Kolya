<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Staff;
use App\User;

class onStoreStaffAccountEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
     public $staff_id;
     public $user_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Staff $staff)
    {
        $this->staff_id=$staff->id;
        $this->user_id=$user->id;
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
