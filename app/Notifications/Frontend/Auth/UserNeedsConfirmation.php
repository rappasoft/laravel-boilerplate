<?php

namespace App\Notifications\Frontend\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserNeedsConfirmation
 * @package App\Notifications\Frontend\Auth
 */
class UserNeedsConfirmation extends Notification
{
    use Queueable;

	/**
	 * @var
	 */
	protected $confirmation_code;

	/**
	 * UserNeedsConfirmation constructor.
	 * @param $confirmation_code
	 */
	public function __construct($confirmation_code)
    {
        $this->confirmation_code = $confirmation_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
			->subject(app_name() . ': ' . trans('exceptions.frontend.auth.confirmation.confirm'))
			->line(trans('strings.emails.auth.click_to_confirm'))
			->action(trans('buttons.emails.auth.confirm_account'), route('frontend.auth.account.confirm', $this->confirmation_code))
			->line(trans('strings.emails.auth.thank_you_for_using_app'));
    }
}
