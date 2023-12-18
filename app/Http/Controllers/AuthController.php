<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function login()
    {
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
            Session::flash('berhasil', 'Anda Berhasil Login');

            return redirect('')->with(['user' => $user]);
        } else {
            Session::flash('gagal', 'Email atau Password tidak valid');

            return redirect('login')->withErrors('Email dan Password yang anda masukkan tidak valid');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function gantiPass()
    {
        $dataAcc = keluar::where('status_persetujuan', 'diterima')->orderBy('tanggal', 'desc')->paginate(10);
        $user = Auth::user();
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();





        return view('pages.auth.gantipass')->with(['acc' => $countacc, 'totalAjuan' => $count, 'suratAcc' => $dataAcc, 'user' => $user]);
    }

    public function proses_ganti_pass(Request $request)
    {
        $data = User::find(Auth::user()->id);

      
        $password = $request->password;
        $konfirmasi_password = $request->konfirmasi_pasword;
        
            if ($password == $konfirmasi_password) {
                $data->password = bcrypt($password);
                $data->save();
                Session::flash('sucess', ' Password Berhasil Diubah');
            } else {
                Session::flash('invalid', 'periksa kembali konfirmasi password');
            }
            return redirect()->back();
        }
    
}
