<?php

namespace App\Http\Controllers;

use App\Models\PengajuanCek;
use App\Models\Summary;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSummary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function index()
    {
        $data_pengajuan_ceks = PengajuanCek::latest()->paginate(10);
        return view('summary.index', compact('data_pengajuan_ceks'));
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

        if($summary){
            //redirect dengan pesan sukses
            return redirect()->route('summary.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('summary.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(PengajuanCek $summary){
        return view('summary.edit', compact('summary'));
    }

    public function update(Request $request, PengajuanCek $summary)
    {
        $this->validate($request, [
            'summary'     => 'required',
            'created_by'   => 'required'
        ]);

        //get data by ID
        // $data_pengajuan = PengajuanCek::findOrFail($data_pengajuan->id);
        $data_pengajuan = Summary::where('pengajuan_id', $summary->pengajuan_id);
        

            $data_pengajuan->update([
                'summary'     => $request->summary,
                'created_by'   => $request->created_by
            ]);
    
        if($data_pengajuan){
            //redirect dengan pesan sukses
            return redirect()->route('summary.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('summary.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function sendSummary(){
        $summary = Summary::findOrFail($this->summaryId);
        
        Mail::to($summary->data_pengajuan->email_pengaju)->send(new SendSummary($summary));
    }
    



}
