<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonsul;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendJadwal;
use Illuminate\Http\Request;

class JadwalKonsulController extends Controller
{
    public function index()
    {
        $data_pengaduans = Pengaduan::latest()->paginate(10);
        return view('jadwalpengaduan.list', compact('data_pengaduans'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'pukul'=> 'required',
            'kronologi'=> 'required',
            'keterangan'=> 'required'
        ]);

        $jadwal = JadwalKonsul::create([
            'tanggal' => $request->tanggal,
            'pukul'=> $request->pukul,
            'kronologi'=> $request->kronologi,
            'keterangan'=> $request->keterangan
        ]);

        if($jadwal){
            //redirect dengan pesan sukses
            return redirect()->route('jadwalpengaduan.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jadwalpengaduan.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Pengaduan $jadwal){
        return view('jadwalpengaduan.edit', compact('jadwal'));
    }

    public function update(Request $request, Pengaduan $jadwal)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'pukul'=> 'required',
            'kronologi'=> 'required',
            'keterangan'=> 'required'
        ]);

        //get data by ID
        // $data_pengajuan = PengajuanCek::findOrFail($data_pengajuan->id);
        $data_pengaduan = Pengaduan::where('pengaduan_id', $jadwal->pengaduan_id);
        
        $id_pengaduan = $jadwal->getKey();

        $response = new $jadwal();
        $response->pengaduan_id = $id_pengaduan;
        $response->summary = $request->summary;
        $response->tanggal = $request->tanggal;
        $response->tanggal = $request->pukul;
        $response->tanggal = $request->kronologi;
        $response->tanggal = $request->keterangan;
        // $response->created_by = $request->created_by;
        // $response->user_id = Auth::id();
        $response->save();

            $data_pengaduan->update([
                'tanggal' => $request->tanggal,
                'pukul'=> $request->pukul,
                'kronologi'=> $request->kronologi,
                'keterangan'=> $request->keterangan
            ]);
    
        if($response){
            //redirect dengan pesan sukses
            return redirect()->route('jadwalpengaduan.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('jadwalpengaduan.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    // public function listJadwal(){
    //     $jadwal_konsuls = JadwalKonsul::latest()->paginate(10);
    //     return view('jadwalpengaduan.index', compact('jadwal_konsuls'));
    // }

    // public function sendJadwal()
    // {
    //     $jadwal = JadwalKonsul::findOrFail($this->summaryId);
        
    //     Mail::to($jadwal->data_pengajuan->email_pengaju)->send(new SendJadwal($summary));
    // }
}