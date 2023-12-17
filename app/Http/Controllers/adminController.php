<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $belum = keluar::where('status_persetujuan', 'belum')->count();
        $count = keluar::where('status_persetujuan', 'diajukan')->count();
        $countacc = keluar::where('status_persetujuan', 'diterima')->count();
        $totMasuk = masuk::count();
        $totKeluar = keluar::count();


        return view('pages.index')->with(['user' => $user, 'totalAjuan' => $count, 'acc' => $countacc, 'belum' => $belum, 'masuk' => $totMasuk, 'keluar' => $totKeluar]);
    }

    public function table()
    {
        $data = masuk::all();
        return view('pages.surat_masuk.table', compact('data'));
    }
    public function surat_masuk()
    {
        return view('pages.surat_masuk.form_surat');
    }

    public function store_surat_masuk(Request $request)
    {
        // $request->validate(
        //     [
        //         'gambar' => 'required|mimes:jpeg,png,jpg,pdf|max:5000',
        //     ],
        //     [
        //         'gambar.required' => 'File Tidak Boleh Kosong',
        //         'gambar.max' => 'File Tidak Boleh Lebih Dari 5MB',
        //         'gambar.mimes' => 'Format File Harus JPG,PNG,PDF',
        //     ]
        // );

        // dd($request->fileberkas);
        if ($request->hasFile('fileberkas')) {
            $berkas = $request->file('fileberkas')->store('uploads/Surat_masuk');
        } else {
            $berkas = 'gambar kosong bang';
        }


        $disposisi = [
            'surat_dari' => $request->surat_dari,
            'tgl_surat' => $request->tanggal,
            'nomor_surat' => $request->nomor_surat,
            'tgl_diterima' => $request->tgl_diterima,
            'nomor_agenda' => $request->nomor_agenda,
            'sifat' => $request->sifat,
            'hal' => $request->hal,
            'catatan' => $request->catatan,
            'valkasubag' => $request->valkasubag,
            'valwaksek' => $request->valwaksek,
            'valkapordi' => $request->valkapordi,
            'valkoordinator' => $request->valkoordinator,
            'valtanggapan' => $request->valtanggapan,
            'valprosesLebih' => $request->valprosesLebih,
            'valkoordinasi' => $request->valkoordinasi,
            'vallainnya' => $request->vallainnya,
        ];


        $pdf = Pdf::loadView('pages.surat_masuk.lembarDisposisi', $disposisi);
        $pdf->setPaper('a4', 'landscape');

        $filename = 'pdf_' . time() . 'Lembar Disposisi.pdf';
        $directoryPath = 'uploads/lembarDisposisi/';
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath, 0775, true, true);
        }
        $pathDisposisi  = $directoryPath . $filename;
        Storage::put($pathDisposisi, $pdf->output());

        $date = Carbon::createFromFormat('Y-m-d', $request->tanggal)->setTime(now()->hour, now()->minute, now()->second)->setTimezone('Asia/Makassar');

        // dd($berkas);
        //  masuk::create([
        //     'nomor_berkas'=>$request->nomor_berkas,
        //     'alamat_pengirim'=>$request->pengirim,
        //     'tanggal_surat'=>$date,
        //     'nomor_surat'=>$request->nomor_surat,
        //     'perihal'=>$request->perihal,
        //     'petunjuk'=>$request->petunjuk,
        //     'nomor_paket'=>$request->nomor_paket,
        //     'berkas'=> $berkas,
        //     'lembarDisposisi'=> $pathDisposisi
        // ]);


        $suratMasuk = new masuk;
        $suratMasuk->nomor_berkas = $request->nomor_berkas;
        $suratMasuk->alamat_pengirim = $request->pengirim;
        $suratMasuk->tanggal_surat = $date;
        $suratMasuk->nomor_surat = $request->nomor_surat;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->petunjuk = $request->petunjuk;
        $suratMasuk->nomor_paket = $request->nomor_paket;
        $suratMasuk->berkas = $berkas;
        $suratMasuk->lembarDisposisi = $pathDisposisi;
        $suratMasuk->save();


        Session::flash('tambah', 'Berhasil Membuat Surat Masuk');
        return redirect('table');
    }

    public function hapus_surat_masuk($id)
    {
        $data = masuk::find($id);
        $pathFile = $data->berkas;
        $pathFileDisposisi = $data->lembarDisposisi;

        if ($pathFile != null || $pathFile != '' || $pathFileDisposisi != null || $pathFileDisposisi != '') {
            Storage::delete($pathFile);
            Storage::delete($pathFileDisposisi);
        }
        $data->delete();
        Session::flash('hapus', 'Berhasil Menghapus Surat Masuk');

        return redirect()->route('dashboard.table')->with('sucess', 'data berhasil dihapus');
    }

    public function pengajuan_ttd($id)
    {
        $data = keluar::find($id);

        $data->status_persetujuan = 'diajukan';
        $data->save();
        Session::flash('ajukanTTD', 'Pengajuan Tanda Tangan Berhasil');


        return redirect()->back();
    }

    public function diterima($id)
    { {
            $data = keluar::find($id);



            $data->status_persetujuan = 'diterima';
            // $data->berkas =  $path;
            $data->save();
            Session::flash('accTTD', 'Surat Berhasil Di Tanda Tadangani');


            return redirect()->back();
        }
    }

    public function hapusSuratKeluar($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;
        $pathFileTTD = $data->berkasTTD;


        if ($pathFile != null || $pathFile != '' || $pathFileTTD != null || $pathFileTTD != '') {
            Storage::delete($pathFile);
            Storage::delete($pathFileTTD);
        }
        Session::flash('hapus', 'Berhasil Menghapus Surat Keluar');

        $data->delete();
        return redirect()->back();
    }
}
