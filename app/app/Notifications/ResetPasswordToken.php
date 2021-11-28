<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use \App\Models\PasswordReset;

class ResetPasswordToken extends Notification {

    use Queueable;

    protected $password_reset;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( PasswordReset $password_reset ) {
        $this->password_reset = $password_reset;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via( $notifiable ) {
        return [
            \Illuminate\Notifications\Channels\MailChannel::class,
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail( $notifiable ) {
        $url = env( 'APP_VIEWS_URL', 'http://localhost:8080' ).'/password_reset?token='.$this->password_reset->token;
        return ( new MailMessage )
            ->subject( 'Resetting password' )
            ->markdown( 'mails.reset_password', compact( 'notifiable', 'url' ) );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray( $notifiable ) {
        return [
            //
        ];
    }

}
