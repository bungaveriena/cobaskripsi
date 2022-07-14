<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest();
        if(request('search')){
            $users->where('nama_pelaku', 'like', '%' . request('search'). '%');
        }
        return view('user.index', [
            "users" => $users->paginate(5)
        ]); 
             //compact('users'));

    }

    // public function index()
    // {
    //     $locations = Location::latest();
    //     if(request('search')){
    //         $locations->where('nama_pelaku', 'like', '%' . request('search'). '%');
    //     }
        
    //     return view('pelaku.index', [
    //         "locations" => $locations->paginate(5)
    //     ]);
    //     // compact('locations'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,'.$id,
    //         'password' => 'same:confirm-password',
    //         'roles' => 'required'
   

    public function edit(User $user)
    {
        
        return view('user.edit',[
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    public function update(Request $request, User $user)
    {
    $this->validate($request, [
        'name' => 'required',
        'role_id' => 'required'
    ]);

    //get data Blog by ID
    $user = User::findOrFail($user->id);


        $user->update([
            'name'     => $request->name,
            'role_id'   => $request->role_id
        ]);
        
        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if($user){
            //redirect dengan pesan sukses
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}

