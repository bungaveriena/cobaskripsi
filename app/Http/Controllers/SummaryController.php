<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCek;
use App\Models\Summary;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{
    public function index()
    {
        $data_pengajuan_ceks = PengajuanCek::latest()->paginate(10);
        return view('summary.index', compact('data_pengajuan_ceks'));

        // $summaries = Summary::latest()->paginate(10);
        // return view('summary.summary', compact('summaries'));
    }

    public function create()
    {
        return view('summary.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'summary' => 'required',
            'created_by' => 'required',
        ]);

        $summary = Summary::create([
            'summary'     => $request->summary,
            'created_by'  => $request->created_by
        ]);

        if ($summary) {
            //redirect dengan pesan sukses
            return redirect()->route('summary.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('summary.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(PengajuanCek $summary)
    {
        return view('summary.edit', compact('summary'));
    }

    public function update(Request $request, PengajuanCek $summary)
    {
        $this->validate($request, [
            'summary'     => 'required',
            'created_by'   => 'required'
        ]);

        //get data by ID
        $id_pengajuan = $summary->getKey();

        $response = new Summary();
        $response->pengajuan_id = $id_pengajuan;
        $response->summary = $request->summary;
        $response->created_by = $request->created_by;
        $response->user_id = Auth::id();
        $response->save();

        if ($response) {
            //redirect dengan pesan sukses
            return redirect()->route('summary.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('summary.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function listSummary(){
        $summaries = Summary::latest()->paginate(10);
        return view('summary.summary', compact('summaries'));
    }

    public function sendSummary()
    {
        $summary = Summary::findOrFail($this->id);

        // $summary = [
        //     'nama_pengaju' => $nama_pengaju,
        //     'email_pengaju' => $email_pengaju,
        //     'nama_diajukan' => $nama_diajukan,
        //     'summary' => $summary
        //   ];
        
        Mail::to($summary->data_pengajuan->email_pengaju)->send(new SendSummary($summary));
    }
    



}
