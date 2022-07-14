<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelakuController extends Controller
{
    
    public function index()
    {
        $locations = Location::latest();
        if(request('search')){
            $locations->where('nama_pelaku', 'like', '%' . request('search'). '%');
        }
        
        return view('pelaku.index', [
            "locations" => $locations->paginate(5)
        ]);
        // compact('locations'));
    }

    // public function search(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$search = $request->search;
 
    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$pegawai = DB::table('locations')
	// 	->where('nama_pelaku','like',"%".$search."%")
	// 	->paginate();
 
    // 		// mengirim data pegawai ke view index
	// 	return view('pelaku.index',['pegawai' => $pegawai]);
 
	// }
}
