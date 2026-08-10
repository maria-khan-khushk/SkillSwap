<?php

namespace App\Notifications;

use App\Models\SkillRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class SkillRequestNotification extends Notification
{
    use Queueable;

    public SkillRequest $skillRequest;

    /**
     * Create a new notification instance.
     */
    public function __construct(SkillRequest $skillRequest)
    {
        $this->skillRequest = $skillRequest;
    }

    /**
     * Notification delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Data stored in the notifications table.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'skill_request_id' => $this->skillRequest->id,

            'skill_id' => $this->skillRequest->skill_id,

            'skill_title' => $this->skillRequest->skill->title,

            'sender_id' => $this->skillRequest->sender_id,

            'sender_name' => $this->skillRequest->sender->name,

            'receiver_id' => $this->skillRequest->receiver_id,

            'receiver_name' => $this->skillRequest->receiver->name,

            'status' => $this->skillRequest->status,

            'message' => $this->getMessage(),
        ];
    }

    /**
     * Notification message.
     */
    private function getMessage(): string
    {
        if ($this->skillRequest->status === 'pending') {

            return $this->skillRequest->sender->name
                . ' sent you a request for '
                . $this->skillRequest->skill->title;

        }

        if ($this->skillRequest->status === 'accepted') {

            return $this->skillRequest->receiver->name
                . ' accepted your request for '
                . $this->skillRequest->skill->title;

        }

        if ($this->skillRequest->status === 'rejected') {

            return $this->skillRequest->receiver->name
                . ' rejected your request for '
                . $this->skillRequest->skill->title;

        }

        return 'Your skill request has been updated.';
    }
}