<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class surat_pensiun_pegawaiController extends Controller
{
    public function surat_pensiun()
    {
        $data = keluar::where('tipe_surat', 'surat pensiun')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kepegawaian.surat_pensiun_dini.table_surat_pensiun')->with(['data' => $data]);
    }

    public function form_surat_pensiun()
    {
        return view('pages.surat_keluar.kepegawaian.surat_pensiun_dini.form_surat_pensiun');
    }

    public function store_surat_pensiun(Request $request)
    {
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan,
            'unit' => $request->unit,
            'alamat' => $request->alamat,
            'tanggalSurat' => $request->tanggalSurat,
            'keterangan' => $request->keterangan,
        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_pensiun', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_pensiun.pdf';
        $directoryPath = 'uploads/suratKeluar/';
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath, 0775, true, true);
        }
        $path = $directoryPath . $filename;
        Storage::put($path, $pdf->output());

        $date = Carbon::createFromFormat('Y-m-d', $request->tanggal)->setTime(now()->hour, now()->minute, now()->second)->setTimezone('Asia/Makassar');

        // return $pdf->download('output.pdf');



        $suratMasuk = new keluar;
        $suratMasuk->nomor_berkas = $request->nomor_berkas;
        $suratMasuk->alamat_penerima = $request->penerima;
        $suratMasuk->tanggal = $date;
        $suratMasuk->tipe_surat = $request->tipeSurat;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->nomor_petunjuk = $request->petunjuk;
        $suratMasuk->nomor_paket = $request->nomor_paket;
        $suratMasuk->berkas = $path;
        $suratMasuk->berkasTTD = 'belumsss';
        $suratMasuk->save();

        return redirect('pegawai-surat-pensiun');
    }

    public function hapus_surat_pensiun($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('pegawai-surat-pensiun')->with('sucess', 'data berhasil dihapus');
    }
}
