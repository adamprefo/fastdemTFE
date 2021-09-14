<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $client = [];
    public $pack = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client,$packs)
    {
       // $this->data = $user;
        /$this->pack = $pack;
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('fastdem@info.com')
        ->subject('Confirmation de payement Fastdem company')
        ->view('emails.confirmationPaiement');
    }
}
