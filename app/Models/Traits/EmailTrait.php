<?php

namespace App\Traits;

use Mail;
use Exception;

trait EmailTrait
{
    public function sendMail($data, $view)
    {
        try {
            Mail::send($view, $data, function ($message) use ($data) {
                $message->from(env('MAIL_FROM', 'noreply@' . env('APP_DOMAIN', 'localhost')), env('APP_NAME', 'Laravel'));
                $message->subject($data['subject']);
                $message->to($data['email']);
            });
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
