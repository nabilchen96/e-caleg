<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengujianBaru extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Informasi Pengujian ' . $this->data['jenis'] . '<No-Reply>';
        return $this->subject($subject)
        ->view('backend.email.emailpengujian')
        ->from('smart.lab@poltekbangplg.ac.id');
    }
}
