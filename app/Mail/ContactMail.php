<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;   // 👈 TAMBAH
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable implements ShouldQueue   // 👈 TAMBAH implements
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Pesan Baru: ' . $this->data['subjek'])
                    ->replyTo($this->data['email'], $this->data['nama'])
                    ->view('emails.contact');
    }
}