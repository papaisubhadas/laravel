<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CarBookNow extends Mailable
{
    use Queueable, SerializesModels;

    public $car_inquiry, $car_type_title, $car_title, $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($car_inquiry, $car_type_title, $car_title, $subject)
    {
        $this->car_inquiry = $car_inquiry;
        $this->subject = $subject;
        $this->car_type_title = $car_type_title;
        $this->car_title = $car_title;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject($this->subject)->view('frontend.pages.emails.car_book');
    }
}
