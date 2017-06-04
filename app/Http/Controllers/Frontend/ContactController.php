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
        $this->notifyEmail = config('mail.from.address');
        $this->notify(new ContactUs($request));

        if ($request->sendcopy) {
            $request->subject = 'Copy of message sent to '.app_name();
            $request->from_email = config('mail.from.address');
            $request->from_name = config('mail.from.name');
            $request->reply_email = config('mail.from.address');
            $request->reply_name = config('mail.from.name');
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
