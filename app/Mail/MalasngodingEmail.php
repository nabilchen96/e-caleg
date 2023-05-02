<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MalasngodingEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('smart.lab@poltekbangplg.ac.id')
                   ->view('backend.email.emailku')
                   ->with(
                    [
                        'nama' => 'Virma Septiani',
                        'website' => 'airportslab.com',
                    ]);
    }
}
