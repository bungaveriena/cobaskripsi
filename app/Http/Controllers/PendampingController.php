<?php

namespace App\Http\Controllers;

use App\Models\Pendamping;
use App\Models\User;
use Illuminate\Http\Request;

class PendampingController extends Controller
{
    public function index()
    {
        $data_pendampings = Pendamping::latest();
        if(request('search')){
            $data_pendampings->where('nama_pendamping', 'like', '%' . request('search'). '%');
        }
        return view('pendamping.index', [
            "data_pendampings" => $data_pendampings->paginate(5)
        ]);
    }

    // public function index()
    // {
    //     $users = User::latest();
    //     if(request('search')){
    //         $users->where('nama_pelaku', 'like', '%' . request('search'). '%');
    //     }
    //     return view('user.index', [
    //         "users" => $users->paginate(5)
    //     ]); 
    //          //compact('users'));

    // }

    public function create()
    {
        return view('pendamping.create');
    }
    
    
    /**
    * store
    *
    * @param  mixed $request
    * @return void
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pendamping'     => 'required',
            'pendidikan'          => 'required',
            'asal_instansi'       => 'required',
            'email'               => 'required',
            'no_tlp'              => 'required'
        ]);

        // 'nama_pendamping', 'pendidikan', 'asal_instansi', 'email', 'no_tlp'
        $pendamping = Pendamping::create([
            'nama_pendamping'     => $request->nama_pendamping,
            'pendidikan'          => $request->pendidikan,
            'asal_instansi'       => $request->asal_instansi,
            'email'               => $request->email,
            'no_tlp'              => $request->no_tlp
        ]);
    
        if($pendamping){
            //redirect dengan pesan sukses
            return redirect()->route('datapendamping.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('datapendamping.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(User $datapendamping)
    {
        return view('pendamping.edit', compact('datapendamping'));
    }
    
    
    /**
    * update
    *
    * @param  mixed $request
    * @param  mixed $blog
    * @return void
    */
    public function update(Request $request, User $datapendamping)
    {
        $this->validate($request, [
            'pendidikan'          => 'required',
            'asal_instansi'       => 'required',
            'no_tlp'              => 'required'
        ]);

        
       //get data by ID
       $id_user = $datapendamping->getKey();


       $response = new Pendamping();
       $response->user_id = $id_user;
       $response->pendidikan = $request->pendidikan;
       $response->asal_instansi = $request->asal_instansi;
       $response->no_tlp = $request->no_tlp;
       $response->save();
       if($response){
           //redirect dengan pesan sukses
           return redirect()->route('datapendamping.index')->with(['success' => 'Data Berhasil Diupdate!']);
       }else{
           //redirect dengan pesan error
           return redirect()->route('datapendamping.index')->with(['error' => 'Data Gagal Diupdate!']);
       }
    }

    public function destroy($id)
    {
      $datapendamping = Pendamping::findOrFail($id);
      $datapendamping->delete();
    
      if($datapendamping){
         //redirect dengan pesan sukses
         return redirect()->route('datapendamping.index')->with(['success' => 'Data Berhasil Dihapus!']);
      }else{
        //redirect dengan pesan error
        return redirect()->route('datapendamping.index')->with(['error' => 'Data Gagal Dihapus!']);
      }
    }
}
