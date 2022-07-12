<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\JadwalKonsul;
use App\Models\Pengaduan;

class SendSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public JadwalKonsul $schedule;
    public Pengaduan $pengaduan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(JadwalKonsul $schedule, Pengaduan $pengaduan)
    {
        //
        $this->schedule = $schedule;
        $this->pengaduan = $pengaduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.TemplateEmailJadwal')
                            ->with([

                                'nama_korban' =>$this->pengaduan->nama_korban,
                                'tanggal' =>$this->schedule->tanggal,
                                'pukul' =>$this->schedule->pukul,
                                'keterangan' =>$this->schedule->keterangan
                            ]);
    }
}
