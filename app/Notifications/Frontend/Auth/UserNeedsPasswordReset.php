<?php

namespace App\Notifications\Frontend\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsPasswordReset
 * @package App\Notifications\Frontend\Auth
 */
class UserNeedsPasswordReset extends Notification
{
    use Queueable;
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(app_name() . ': ' . trans('strings.emails.auth.password_reset_subject'))
            ->line(trans('strings.emails.auth.password_cause_of_email'))
            ->action(trans('buttons.emails.auth.reset_password'), route('frontend.auth.password.reset_form', $this->token))
            ->line(trans('strings.emails.auth.password_if_not_requested'));
    }
                        // ->subject(app_name() . ': ' . trans('exceptions.frontend.auth.confirmation.confirm'))
                        // ->line(trans('strings.emails.auth.click_to_confirm'))
                        // ->action(trans('buttons.emails.auth.confirm_account'), route('frontend.auth.account.confirm', $this->confirmation_code))
                        // ->line(trans('strings.emails.auth.thank_you_for_using_app'));

}
