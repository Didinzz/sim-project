<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pegawaiController extends Controller
{
    public function surat_dispen_guru()
    {
        $data = keluar::where('tipe_surat', 'Surat Dispen Guru')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kepegawaian.surat_dispen_guru.table_surat_dispen_guru')->with(['data' => $data]);
    }

    public function form_surat_dispen_guru()
    {
        return view('pages.surat_keluar.kepegawaian.surat_dispen_guru.form_surat_dispen_guru');
    }

    public function store_surat_dispen_guru(Request $request)
    {

        $kepalasekolah = User::where('role', 2)->first();
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'nama_guru' => $request->nama_guru,
            'sekolah' => $request->sekolah,
            'utusan' => $request->utusan,
            'perihalKegiatan' => $request->perihalKegiatan,
            'nama_kepala' => $kepalasekolah->nama,
            'nip_kepala' => $kepalasekolah->nip,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_dispen_guru', $data);
        // $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_dispen_guru_siswa', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_dispen_guru.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_ket_pindah_acc.pdf';

        $directoryPath = 'uploads/suratKeluar/';
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath, 0775, true, true);
        }

        $path = $directoryPath . $filename;
        $pathTTD = $directoryPath . $filenameTTD;

        Storage::put($path, $pdf->output());
        // Storage::put($pathTTD, $pdfTtd->output());

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
        $suratMasuk->berkasTTD = "belum";
        $suratMasuk->save();

        return redirect('pegawai-surat-dispen-guru');
    }
}
