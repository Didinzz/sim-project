<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class kepsekController extends Controller
{
    public function index(){
        $countacc = keluar::where('status_persetujuan', 'diajukan')->count();
        $count = keluar::where('status_persetujuan', 'diterima')->count();

        $dataDiajukan = keluar::where('status_persetujuan', 'diajukan')->orderBy('tanggal', 'desc')->paginate(10);
        return view('pages.kepsek.index')->with(['totalAjuan' => $count, 'diajukan' => $dataDiajukan, 'acc'=>$countacc]);
    }

    public function profile(){
        $countacc = keluar::where('status_persetujuan', 'diajukan')->count();
        $count = keluar::where('status_persetujuan', 'diterima')->count();

        
        return view('pages.kepsek.profil')->with(['totalAjuan' => $count, 'acc' => $count,]);
    }

    public function surat_acc(){
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();
        $dataAcc = keluar::where('status_persetujuan', 'diterima')->orderBy('tanggal', 'desc')->paginate(10);





        return view('pages.kepsek.surat_acc')->with(['acc' =>$countacc, 'totalAjuan' => $count, 'suratAcc' => $dataAcc]);
    }

    public function update_profile(Request $request)
    {
        $logged = Auth::user()->id;
        $user = User::find($logged);

        $nama = $request->nama;
        $nip = $request->nip;


        if ($request->hasFile('file_ttd')) {
            $path = $request->file('file_ttd')->store('uploads/ttd', 'public');

            $pathFile = $user->ttd;
            if ($pathFile != null || $pathFile != '') {
                Storage::delete($pathFile);
            }
        } else {
            $path = $user->ttd;
        }

        $user->name = $nama;
        $user->nip = $nip;
        $user->ttd = $path;
        $user->save();

        return redirect()->back();
    }
}
