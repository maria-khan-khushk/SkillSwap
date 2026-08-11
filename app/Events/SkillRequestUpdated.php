<?php

namespace App\Events;

use App\Models\SkillRequest;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SkillRequestUpdated implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public SkillRequest $skillRequest;

    /**
     * Create a new event instance.
     */
    public function __construct(SkillRequest $skillRequest)
    {
        $this->skillRequest = $skillRequest;
    }

    /**
     * Channel on which the event will be broadcast.
     */
    public function broadcastOn()
    {
        return new PrivateChannel(
            'user.' . $this->skillRequest->sender_id
        );
    }

    /**
     * Event name on frontend.
     */
    public function broadcastAs()
    {
        return 'skill-request-updated';
    }

    /**
     * Data sent to the frontend.
     */
    public function broadcastWith()
    {
        return [
            'id' => $this->skillRequest->id,

            'status' => $this->skillRequest->status,

            'skill_id' => $this->skillRequest->skill_id,

            'skill_title' => $this->skillRequest->skill->title,

            'message' => $this->skillRequest->status === 'accepted'
                ? $this->skillRequest->receiver->name
                    . ' accepted your request for '
                    . $this->skillRequest->skill->title
                : $this->skillRequest->receiver->name
                    . ' rejected your request for '
                    . $this->skillRequest->skill->title,
        ];
    }
}