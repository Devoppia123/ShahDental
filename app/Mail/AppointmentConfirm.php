<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $check_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $check_email)
    {
        $this->details = $details;
        $this->check_email = $check_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Shah Dental')
            ->view('wordpress.appointment_mail');
    }
}
