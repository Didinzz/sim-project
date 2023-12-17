<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class pegawaiController extends Controller
{
    public function surat_dispen_guru(Request $request)
    {
        $keyword = $request->input('search');
        $data = keluar::where('tipe_surat', 'Surat Dispen Guru')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);   


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
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_dispen_guru', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_dispen_guru', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_dispen_guru.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_ket_dispen_acc.pdf';

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
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');

        return redirect('pegawai-surat-dispen-guru');
    }


    // Surat Cuti
    public function surat_cuti(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Cuti')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);   


        return view('pages.surat_keluar.kepegawaian.surat_cuti.table_surat_cuti')->with(['data' => $data]);
    }

    public function form_surat_cuti()
    {
        return view('pages.surat_keluar.kepegawaian.surat_cuti.form_surat_cuti');
    }

    public function store_surat_cuti(Request $request)
    {
        $kepalasekolah = User::where('role', 2)->first();

        $data = [
            'tanggalSurat' => $request->tanggalSurat,
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'pangkatGolongan' => $request->pangkatGolongan,
            'jabatan' => $request->jabatan,
            'satuanKerja' => $request->satuanKerja,
            'noHP' => $request->noHP,
            'tanggal_mulai_cuti' => $request->tanggal_mulai_cuti,
            'tanggal_akhir_cuti' => $request->tanggal_akhir_cuti,
            'alasan' => $request->alasan,
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,


        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_cuti_pegawai', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_cuti_pegawai', $data);

        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'suratCuti.pdf';
        $filenameTTD = 'pdf_' . time() . 'suratCuti_acc.pdf';

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
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');

        return redirect('pegawai-surat-cuti');
    }



    // surat tugas
    public function surat_tugas(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Tugas')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);   


        return view('pages.surat_keluar.kepegawaian.surat_tugas.table_surat_tugas')->with(['data' => $data]);
    }

    public function form_surat_tugas()
    {
        return view('pages.surat_keluar.kepegawaian.surat_tugas.form_surat_tugas');
    }

    public function store_surat_tugas(Request $request)
    {
        $kepalasekolah = User::where('role', 2)->first();

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
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_tugas_pegawai', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_tugas_pegawai', $data);

        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'SuratTugas.pdf';
        $filenameTTD = 'pdf_' . time() . 'SuratTugas_acc.pdf';

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
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');

        return redirect('pegawai-surat-tugas');
    }


    // Surat Pensiun
    public function surat_pensiun(Request $request)
    {
        $keyword = $request->input('search');
        $data = keluar::where('tipe_surat', 'Surat Pensiun')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);   


        return view('pages.surat_keluar.kepegawaian.surat_pensiun_dini.table_surat_pensiun')->with(['data' => $data]);
    }

    public function form_surat_pensiun()
    {
        return view('pages.surat_keluar.kepegawaian.surat_pensiun_dini.form_surat_pensiun');
    }

    public function store_surat_pensiun(Request $request)
    {
        $kepalasekolah = User::where('role', 2)->first();

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
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,
        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_pensiun', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_pensiun', $data);

        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'Surat_pensiun.pdf';
        $filenameTTD = 'pdf_' . time() . 'Surat_pensiun_acc.pdf';

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
        $suratMasuk->berkasTTD =  $pathTTD;
        $suratMasuk->save();
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');


        return redirect('pegawai-surat-pensiun');
    }

    // Surat Home Visit

    public function surat_home_visit(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Home Visit')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);   



        return view('pages.surat_keluar.kepegawaian.surat_home_visit.table_surat_home_visit')->with(['data' => $data]);
    }

    public function form_surat_home_visit()
    {
        return view('pages.surat_keluar.kepegawaian.surat_home_visit.form_surat_home_visit');
    }

    public function store_surat_home_visit(Request $request)
    {
        $kepalasekolah = User::where('role', 2)->first();

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
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_home_visit', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_home_visit', $data);

        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'Surat_Home_Visit.pdf';
        $filenameTTD = 'pdf_' . time() . 'Surat_Home_Visit_acc.pdf';

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
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');


        return redirect('pegawai-surat-home-visit');
    }
}
