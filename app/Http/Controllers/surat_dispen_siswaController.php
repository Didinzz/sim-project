<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class surat_dispen_siswaController extends Controller
{
    public function surat_dispen()
    {
        $data = keluar::where('tipe_surat', 'Surat Dispen')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kesiswaan.surat_dispen.table_surat_dispen')->with(['data' => $data]);
    }

    public function form_surat_dispen()
    {
        return view('pages.surat_keluar.kesiswaan.surat_dispen.form_surat_dispen');
    }

    public function store_surat_dispen(Request $request)
    {

        $kepalasekolah = User::where('role', 2)->first();
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'SuratDari' => $request->SuratDari,
            'perihal' => $request->perihal,
            'date_perihal' => $request->date_perihal,
            'nomor_perihal' => $request->nomor_perihal,
            'nama_siswa' => $request->nama_siswa,
            'kelas_siswa' => $request->kelas_siswa,
            'asalSekolah' => $request->asalSekolah,
            'kegiatan' => $request->kegiatan,
            'tahun' => $request->tahun,
            'waktu_dilaksanakan' => $request->waktu_dilaksanakan,
            'tgl_dilaksanakan' => $request->tgl_dilaksanakan,
            'tempat_dilaksanakan' => $request->tempat_dilaksanakan,
            'nama_kepala' => $kepalasekolah->nama,
            'nip_kepala' => $kepalasekolah->nip,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];  

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_dispen_siswa', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_dispen_siswa', $data);
        // $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_dispen.pdf';
        $filenameTTD = 'pdf_' . time() . 'Disepnsasi Siswa Acc.pdf';

        $directoryPath = 'uploads/suratKeluar/';
        if (!Storage::exists($directoryPath)) {
            Storage::makeDirectory($directoryPath, 0775, true, true);
        }

        $path = $directoryPath . $filename;
        $pathTTD = $directoryPath . $filenameTTD;

        Storage::put($path, $pdf->output());
        Storage::put($pathTTD, $pdfTtd->output());

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
        $suratMasuk->berkasTTD = $pathTTD;
        $suratMasuk->save();

        return redirect('siswa-surat-dispen');
    }

    public function hapus_surat_dispen($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('siswa-surat-dispen')->with('sucess', 'data berhasil dihapus');
    }
}
