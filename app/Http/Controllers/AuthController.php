<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function regis(){
        return view('auth.register');  // tampilan page nya 
    }

    public function  proses_regis(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'role_id' => 'required|integer',
            'email' => 'required|email',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $user = User::create([
            'name' => $request->name,
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->to('/login');
        // return redirect() dd($user);
    }
}