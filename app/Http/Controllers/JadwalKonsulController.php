<?php

namespace App\Http\Controllers;

use App\Models\JadwalKonsul;
use App\Models\Pengaduan;
use App\Models\Pendamping;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendJadwal;
use App\Mail\SendSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Response;
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
            //'kronologi'=> 'required',
            'keterangan'=> 'required'
        ]);

        $jadwal = JadwalKonsul::create([
            'tanggal' => $request->tanggal,
            'pukul'=> $request->pukul,
            //'kronologi'=> $request->kronologi,
            'keterangan'=> $request->keterangan
        ]);

        if($jadwal){
            //redirect dengan pesan sukses
            return redirect()->route('datajadwalkonsul.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('datajadwalkonsul.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit(Pengaduan $datajadwalkonsul){
        return view('jadwalpengaduan.edit',[
            'datajadwalkonsul' => $datajadwalkonsul,
            'data_pendampings' => Pendamping::all()
        ]);
    }


    public function update(Request $request, Pengaduan $datajadwalkonsul)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'pukul'=> 'required',
            'pendamping_id'=> 'required',
            'keterangan'=> 'required'
        ]);

        //get data by ID
        $id_pengaduan = $datajadwalkonsul->getKey();


        $response = new JadwalKonsul();
        $response->pengaduan_id = $id_pengaduan;
        $response->tanggal = $request->tanggal;
        $response->pukul = $request->pukul;
        $response->pendamping_id = $request->pendamping_id;
        //$response->kronologi = $request->kronologi;
        $response->keterangan = $request->keterangan;
        // $response->user_id = Auth::id();
        $response->save();
        if($response){
            // kirim email yang terdaftar di korban pada form pengaduan
            Mail::to($datajadwalkonsul->email_korban)->send(new SendSchedule($response, $datajadwalkonsul)); 
            //redirect dengan pesan sukses
            return redirect()->route('datajadwalkonsul.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('datajadwalkonsul.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function listJadwal(){
        $jadwal_konsuls = JadwalKonsul::latest()->paginate(10);
        return view('jadwalpengaduan.index', compact('jadwal_konsuls'));
    }

    //download file bukti
    // function getFile($filename){
    //     $files = Storage::files("public");
    //     $fileBukti=array();
    //     foreach ($files as $key => $value) {
    //         $value= str_replace("public/","",$value);
    //         array_push($fileBukti,$value);
    //     }
    // return view('show', ['bukti' => $bukti]);
    //     $file=Storage::disk('public')->get($filename);
  
    //     return (new Response($file, 200))
    //           ->header('Content-Type', 'image/jpeg');
    // }

    public function sendJadwal()
    {
        $jadwal = JadwalKonsul::findOrFail($this->Id);
        
        Mail::to($jadwal->data_pengajuan->email_pengaju)->send(new SendJadwal($jadwal));
    }
}
