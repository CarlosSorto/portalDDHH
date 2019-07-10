<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Request.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new message instance.
     */
    public function __construct($request)
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
        $name    = $this->request->get('name');
        $message = $this->request->get('message');
        $email   = $this->request->get('email');
        $phone   = $this->request->get('phone');

        return $this->markdown('emails.contact')
                    ->replyTo($email)
                    ->subject($name.' se quiere contactar.')
                    ->with(compact('message', 'phone', 'name'));
    }
}
