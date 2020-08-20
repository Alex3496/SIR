<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLocationMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Nueva Ubicación";

    public $location_complete;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($location_complete)
    {
        $this->location_complete = $location_complete;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newLocation',[
            'location_complete' => $this->location_complete,
        ]);
    }
}
