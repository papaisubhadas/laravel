<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquiryUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $customer_name, $car_name, $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($customer_name, $car_name,$subject)
    {
        $this->customer_name = $customer_name;
        $this->car_name = $car_name;
        $this->subject = $subject;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject($this->subject)->view('frontend.pages.emails.statusupdate');
    }
}
