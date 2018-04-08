<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Broadcast;

class NotificationSystem extends Notification
{
    use Queueable;

   protected $notify, $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notify, $message)
    {
        $this->notify = $notify;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'unique_id' => $this->notify->unique_id,
            'message' => $this->message,
            'created_date' => Carbon::now(),
            'merchant_id' => $this->notify->merchant_id,
            'sender' => [
                           'name' => auth()->user()->name,
                            'id' => auth()->user()->id,
                            'photo' => auth()->user()->photo,
                        ]
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'unique_id' => $this->notify->unique_id,
            'message' => $this->message,
            'created_date' => Carbon::now(),
            'merchant_id' => $this->notify->merchant_id,
            'sender' => [
                'name' => auth()->user()->name,
                'id' => auth()->user()->id,
                'photo' => auth()->user()->photo,
            ]
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
