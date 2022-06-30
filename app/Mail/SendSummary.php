<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSummary extends Mailable
{
    use Queueable, SerializesModels;

    protected $nama_pelaku, $nama_pengaju, $summary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama_pengaju, $nama_pelaku, $summary)
    {
        $this->nama_pengaju;
        $this->nama_pelaku;
        $this->summary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.TemplateEmailSummary');
    }
}
