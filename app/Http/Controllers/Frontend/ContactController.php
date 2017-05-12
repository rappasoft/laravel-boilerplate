<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Frontend\ContactUs;
use App\Http\Requests\Frontend\ContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    use Notifiable;

    public $notifyEmail;

    /**
     * Show the contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showContactForm()
    {
        return view('frontend.contact');
    }

    /**
     * @param ContactRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function contact(ContactRequest $request)
    {
        $request->subject = 'Message From '.app_name();
        $request->from_email = $request->email;
        $request->from_name = $request->name;
        $request->reply_email = $request->email;
        $request->reply_name = $request->name;
        $this->notifyEmail = env('MAIL_FROM_ADDRESS');
        $this->notify(new ContactUs($request));

        if ($request->sendcopy) {
            $request->subject = 'Copy of message sent to '.app_name();
            $request->from_email = env('MAIL_FROM_ADDRESS');
            $request->from_name = env('MAIL_FROM_NAME');
            $request->reply_email = env('MAIL_FROM_ADDRESS');
            $request->reply_name = env('MAIL_FROM_NAME');
            $this->notifyEmail = $request->email;
            $this->notify(new ContactUs($request));
        }

        //event(new ContactSent());
        return redirect()->route('frontend.contact')->withStatus(trans('alerts.frontend.contact.thank_you'));
    }

    public function routeNotificationForMail()
    {
        return $this->notifyEmail;
    }

}
