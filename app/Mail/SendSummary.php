<?php

namespace App\Mail;

use App\Models\PengajuanCek;
use App\Models\Summary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSummary extends Mailable
{
    use Queueable, SerializesModels;

    public $konten_email;

    protected $nama_pelaku, $nama_pengaju, $summary;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PengajuanCek $summary)
    {
        $this->summary = $summary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.TemplateEmailSummary')
                    ->with([

                        'nama_diajukan' =>$this->summary->nama_diajukan,
                        'nama_pengaju'=>$this->summary->nama_pengaju,
                        'summary'=>$this->summary->summary->summary,
                    ]);
    }
}
