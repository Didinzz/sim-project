<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function login (){
        return view('pages.auth.login');
        
    }

    public function proses_login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.require' => 'email tidak bisa kosong',
                'password.require' => 'password tidak bisa kosong',
            ]
        );

        $email = $request->email;
        $password = $request->password;


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // $request->session()->regenerate();
            $user = Auth::user();
            return redirect('')->with(['user' => $user]);
        } else {
            return redirect('login')->withErrors('Email dan Password yang anda masukkan tidak valid');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
