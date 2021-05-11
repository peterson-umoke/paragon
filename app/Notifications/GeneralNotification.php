<?php

namespace App\Notifications\Admin;

use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeneralNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $message;
    private string $title;
    /**
     * @var null
     */
    private $action;
    /**
     * @var null
     */
    private $meta;

    public function __construct($message, $action = null, $meta = null, $title = "General Notification")
    {
        $this->message = $message;
        $this->title = $title;
        $this->action = $action;
        $this->meta = $meta;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            "heading" => $this->title,
            'message' => $this->message,
            'type' => 'General',
            "action" => $this->action,
            'meta' => $this->meta,
        ];
    }
}
