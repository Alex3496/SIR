<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMessage extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "Solicitud de transporte";

    public $tariff;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tariff,$user)
    {
        $this->tariff = $tariff;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.booking',[
            'tariff' => $this->tariff,
            'user' => $this->user,
         ]);
    }
}
