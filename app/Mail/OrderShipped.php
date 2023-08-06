<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $comment=[];
    public function __construct($comment)
    {
        $this->comment=$comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $your_name = 'Ignore Me';
        $subject = 'Hello';

        return $this->view('mail')
            ->from(env('MAIL_USERNAME'), $your_name)
            ->subject($subject)
            ->with('comment',$this->comment);
    }
}
