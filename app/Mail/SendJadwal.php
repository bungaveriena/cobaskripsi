<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendJadwal extends Mailable
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
        return $this->view('emails.TemplateEmailJadwal.blade.php')
                            ->with([

                                'nama_korban' =>$this->datajadwalkonsul->nama_korban,
                                'tanggal' =>$this->datajadwalkonsul->datajadwalkonsul->tanggal,
                                'pukul' =>$this->datajadwalkonsul->datajadwalkonsul->pukul,
                                'keterangan' =>$this->datajadwalkonsul->datajadwalkonsul->keterangan,
                                //'pendamping'=>$this->datajadwalkonsul->pendamping,
                                'summary'=>$this->summary->summary->summary,
                            ]);
    }
}
