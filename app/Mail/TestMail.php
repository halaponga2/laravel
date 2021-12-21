<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $textString;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($textString)
    {
        $this->textString = $textString;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('test@gmail.com')
            ->to('halaponga2@gmail.com')
            ->view('mails.test-mail')
            ->with([
                'textString' => $this->textString,
            ]);
            
    }
}