<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class surat_keterangan_siswaController extends Controller
{
    public function surat_keterangan()
    {
        $data = keluar::where('tipe_surat', 'surat keterangan')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kesiswaan.surat_keterangan.table_surat_keterangan')->with(['data' => $data]);
    }

    public function form_surat_keterangan()
    {
        return view('pages.surat_keluar.kesiswaan.surat_keterangan.form_surat_keterangan');
    }

    public function store_surat_keterangan(Request $request)
    {
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'npsn' => $request->npsn,
            'kelasjurusan' => $request->kelasjurusan,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'tanggalSuratKeluar' => $request->tanggalSuratKeluar,
            'keterangan' => $request->keterangan,
        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_keterangan_siswa', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_keterangan.pdf';
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
        $suratMasuk->save();

        return redirect('siswa-surat-keterangan');
    }

    public function hapus_surat_keterangan($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('siswa-surat-keterangan')->with('sucess', 'data berhasil dihapus');
    }
}
