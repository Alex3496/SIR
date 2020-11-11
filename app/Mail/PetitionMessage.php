<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PetitionMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Empresa Interesada";

    public $petition;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($petition,$user)
    {
        $this->petition = $petition;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->view('emails.petition',[
            'petition' => $this->petition,
            'user' => $this->user,
         ]);
    }
}
