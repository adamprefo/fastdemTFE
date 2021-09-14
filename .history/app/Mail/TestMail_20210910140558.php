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
    public $packs = [];
    public  $user = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client,$packs, $user,$devis)
    {
       // $this->data = $user;
        $this->packs = $packs;
        $this->client = $client;
        $this->user =  $user;
        $this->devis =  $devis;
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
