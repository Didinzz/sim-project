<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class surat_tugas_pegawaiController extends Controller
{
    public function surat_tugas()
    {
        $data = keluar::where('tipe_surat', 'Surat tugas')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kepegawaian.surat_tugas.table_surat_tugas')->with(['data' => $data]);
    }

    public function form_surat_tugas()
    {
        return view('pages.surat_keluar.kepegawaian.surat_tugas.form_surat_tugas');
    }

    public function store_surat_tugas(Request $request)
    {
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'SuratDari' => $request->SuratDari,
            'perihal' => $request->perihal,
            // 'date_perihal' => $request->date_perihal,
            'nomor_perihal' => $request->nomor_perihal,
            'nama_guru' => $request->nama_guru,
            'jabatan' => $request->jabatan,
            'keterangan' => $request->keterangan,
            'kegiatan' => $request->kegiatan,
            // 'tahun' => $request->tahun,
            'waktu_dilaksanakan' => $request->waktu_dilaksanakan,
            'tgl_dilaksanakan' => $request->tgl_dilaksanakan,
            'tempat_dilaksanakan' => $request->tempat_dilaksanakan,
            'nama_kepala' => $request->nama_kepala,
            'nip_kepala' => $request->nip_kepala,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_tugas_pegawai', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_tugas.pdf';
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
        $suratMasuk->berkasTTD = "belum";
        $suratMasuk->save();

        return redirect('pegawai-surat-tugas');
    }

    public function hapus_surat_tugas($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('pegawai-surat-tugas')->with('sucess', 'data berhasil dihapus');
    }
}
