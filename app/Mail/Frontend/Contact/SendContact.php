<?php

namespace App\Mail\Frontend\Contact;

use App\Http\Requests\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendContact
 *
 * @package App\Mail\Frontend\Contact
 */
class SendContact extends Mailable
{
    use Queueable, SerializesModels;

	/**
	 * @var Request
	 */
	public $request;

	/**
	 * SendContact constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.mail.contact')
			->subject('A new '.app_name().' contact form submission!');
    }
}