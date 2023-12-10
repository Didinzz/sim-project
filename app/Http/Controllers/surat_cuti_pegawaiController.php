<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class surat_cuti_pegawaiController extends Controller
{
    public function surat_cuti(){
        $data = keluar::where('tipe_surat', 'suratCuti')->orderBy('tanggal', 'desc')->get();


        return view('pages.surat_keluar.kepegawaian.surat_cuti.table_surat_cuti')->with(['data' => $data]);
    }

    public function form_surat_cuti(){
    return view('pages.surat_keluar.kepegawaian.surat_cuti.form_surat_cuti');
}

    public function store_surat_cuti(Request $request){
        $data = [
            'nama' =>$request->nama,
            'nip' =>$request->nip,
            'pangkatGolongan' =>$request->pangkatGolongan,
            'jabatan' =>$request->jabatan,
            'satuanKerja' =>$request->satuanKerja,
            'noHP' =>$request->noHP,
            'tanggal_mulai_cuti' =>$request->tanggal_mulai_cuti,
            'tanggal_akhir_cuti' =>$request->tanggal_akhir_cuti,
            'alasan' =>$request->alasan,
            'tanggalSuratKeluar' =>$request->tanggalSuratKeluar,
            
        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_cuti_pegawai', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'suratCuti.pdf';
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

        return redirect('pegawai-surat-cuti');
    }

    public function hapus_surat_cuti($id)
    {
        $data = keluar::find($id);
        $pathFile = $data->berkas;

        if ($pathFile != null || $pathFile != '') {
            Storage::delete($pathFile);
        }
        $data->delete();
        return redirect()->route('pegawai-surat-cuti')->with('sucess', 'data berhasil dihapus');
    }
}
