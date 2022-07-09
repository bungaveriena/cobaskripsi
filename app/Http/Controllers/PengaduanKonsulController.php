<?php

namespace App\Http\Controllers;
use App\Models\JadwalKonsul;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendJadwal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengaduanKonsulController extends Controller
{
    public function index()
    {
        $data_pengaduans = Pengaduan::latest()->paginate(10);
        return view('pengaduankonsul.index', compact('data_pengaduans'));
    }

    public function edit(Pengaduan $jadwal)
    {
        return view('pengaduankonsul.edit', compact('jadwal'));
    }

    public function update(Request $request, Pengaduan $jadwal)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'pukul'=> 'required',
            'pendamping'=> 'required',
            // 'kronologi'=> 'required',
            // 'keterangan'=> 'required'
        ]);

        //get data by ID
        $id_pengaduan = $jadwal->getKey();

        $response = new JadwalKonsul();
        $response->pengaduan_id = $id_pengaduan;
        $response->tanggal = $request->tanggal;
        $response->pukul = $request->pukul;
        $response->pendamping = $request->pendamping;
        $response->kronologi = $request->kronologi;
        $response->keterangan = $request->keterangan;
        // $response->user_id = Auth::id();
        $response->save();

        if ($response) {
            // kirim email ke user yang melakukan pengajuan cek
            Mail::to($jadwal->email_korban)->send(new SendJadwal($jadwal));          
            //redirect dengan pesan sukses
            return redirect()->route('pengaduankonsul.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('pengaduankonsul.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }
}
