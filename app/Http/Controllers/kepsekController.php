<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class kepsekController extends Controller
{
    public function index(Request $request){
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();
        $keyword = $request->input('search');

        $dataDiajukan = keluar::where('status_persetujuan', 'diajukan')
        ->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('tipe_surat', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })
        ->orderBy('tanggal', 'desc')->paginate(10);  

        
        return view('pages.kepsek.index')->with(['totalAjuan' => $count, 'diajukan' => $dataDiajukan, 'acc'=>$countacc]);
    }

    public function profile(){
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $user = Auth::user();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();

        
        return view('pages.kepsek.profil')->with(['totalAjuan' => $count, 'acc' => $countacc, 'user' => $user]);
    }
    public function sidebar(){
        $countacc = keluar::where('status_persetujuan', 'diajukan')->count();
        $count = keluar::where('status_persetujuan', 'diterima')->count();

        
        return view('components.sidebar')->with(['totalAjuan' => $count, 'acc' => $countacc]);
    }

    public function surat_acc(Request $request){
        $keyword = $request->input('search');

        $dataAcc = keluar::where('status_persetujuan', 'diterima')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('tipe_surat', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10); 
        $user = Auth::user();
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();





        return view('pages.kepsek.surat_acc')->with(['acc' =>$countacc, 'totalAjuan' => $count, 'suratAcc' =>$dataAcc, 'user' => $user]);
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
