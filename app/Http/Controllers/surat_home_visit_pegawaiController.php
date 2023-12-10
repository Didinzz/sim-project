<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class surat_home_visit_pegawaiController extends Controller
{
    public function surat_home_visit()
    {
        $data = keluar::where('tipe_surat', 'suratHome visit')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kepegawaian.surat_home_visit.table_surat_home_visit')->with(['data' => $data]);
    }

    public function form_surat_home_visit()
    {
        return view('pages.surat_keluar.kepegawaian.surat_home_visit.form_surat_home_visit');
    }

    public function store_surat_home_visit(Request $request)
    {
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'namasiswa' => $request->namasiswa,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'tanggalKunjungan' => $request->tanggalKunjungan,
            'tanggalSurat' => $request->tanggalSurat,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_home_visit', $data);
        $pdf->setPaper('a4');

        // $filename = 'pdf_' . time() . 'suratHome_visit.pdf';
        // $directoryPath = 'uploads/suratKeluar/';
        // if (!Storage::exists($directoryPath)) {
        //     Storage::makeDirectory($directoryPath, 0775, true, true);
        // }
        // $path = $directoryPath . $filename;
        // Storage::put($path, $pdf->output());

        // $date = Carbon::createFromFormat('Y-m-d', $request->tanggal)->setTime(now()->hour, now()->minute, now()->second)->setTimezone('Asia/Makassar');

        return $pdf->download('output.pdf');



        // $suratMasuk = new keluar;
        // $suratMasuk->nomor_berkas = $request->nomor_berkas;
        // $suratMasuk->alamat_penerima = $request->penerima;
        // $suratMasuk->tanggal = $date;
        // $suratMasuk->tipe_surat = $request->tipeSurat;
        // $suratMasuk->perihal = $request->perihal;
        // $suratMasuk->nomor_petunjuk = $request->petunjuk;
        // $suratMasuk->nomor_paket = $request->nomor_paket;
        // $suratMasuk->berkas = $path;
        // $suratMasuk->save();

        // return redirect('pegawai-surat-home_visit');
    }

    public function hapus_surat_home_visit($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('pegawai-surat-home_visit')->with('sucess', 'data berhasil dihapus');
    }
}