<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('user.index', compact('users'));

        // $summaries = Summary::latest()->paginate(10);
        // return view('summary.summary', compact('summaries'));
    }
    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     $roles = Role::pluck('name','name')->all();
    //     $userRole = $user->roles->pluck('name','name')->all();
    
    //     return view('users.edit',compact('user','roles','userRole'));
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

