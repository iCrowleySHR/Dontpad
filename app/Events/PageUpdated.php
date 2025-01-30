<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PageUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $content;
    public $slug;
    public $userId;

    /**
     * Create a new event instance.
     */
    public function __construct($page, $userId)
    {
        $this->content = $page->content;
        $this->slug = $page->slug;  
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('page-updated.'.$this->slug),
        ];
    }

    public function broadcastWith(){
        return [
            'content' => $this->content,
            'slug' => $this->slug,
            'userId' => $this->userId
        ];
    }
}