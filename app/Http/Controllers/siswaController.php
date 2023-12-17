<?php

namespace App\Http\Controllers;

use App\Models\keluar;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{

    public function surat_dispen(Request $request)
    {
        $keyword = $request->input('search');
        $data = keluar::where('tipe_surat', 'Surat Dispen')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                    ->orWhere('alamat_penerima', 'like', "%$keyword%")
                    ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                    ->orWhere('nomor_paket', 'like', "%$keyword%")
                    ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);


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
            'nama_kepala' => $kepalasekolah->name,
            'golongan_kepala' => $kepalasekolah->Golongan,
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
        Session::flash('tambah', 'Berhasil Membuat Surat Keluar');


        return redirect('siswa-surat-dispen');
    }


    public function surat_pindah(Request $request)
    {
        $keyword = $request->input('search');
        $data = keluar::where('tipe_surat', 'Surat Pindah')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                    ->orWhere('alamat_penerima', 'like', "%$keyword%")
                    ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                    ->orWhere('nomor_paket', 'like', "%$keyword%")
                    ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);


        return view('pages.surat_keluar.kesiswaan.surat_pindah.table_surat_pindah')->with(['data' => $data]);
    }

    public function form_surat_pindah()
    {
        return view('pages.surat_keluar.kesiswaan.surat_pindah.form_surat_pindah');
    }

    public function store_surat_pindah(Request $request)
    {

        $kepalasekolah = User::where('role', 2)->first();
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'nama_siswa' => $request->nama_siswa,
            'ttl' => $request->ttl,
            'asalSekolah' => $request->asalSekolah,
            'jeniskelamin' => $request->jeniskelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tingkat' => $request->tingkat,
            'nisn' => $request->nisn,
            'tanggalterima' => $request->tanggalterima,
            'tanggalPindah' => $request->tanggalPindah,
            'prodi' => $request->prodi,
            'prodiPindah' => $request->prodiPindah,
            'tingkatPindah' => $request->tingkatPindah,
            'sebabKeluar' => $request->sebabKeluar,
            'pindahSekolah' => $request->pindahSekolah,
            'namaOrtu' => $request->namaOrtu,
            'alamatOrtu' => $request->alamatOrtu,
            'pekerjaan' => $request->pekerjaan,
            'keterangan' => $request->keterangan,
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_pindah', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_pindah_siswa', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_pindah.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_ket_pindah_acc.pdf';

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


        return redirect('siswa-surat-pindah');
    }

    // surat Rekomendasi Beassiwa
    public function surat_rekomendasi_beasiswa(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Rekom Beasiswa')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                    ->orWhere('alamat_penerima', 'like', "%$keyword%")
                    ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                    ->orWhere('nomor_paket', 'like', "%$keyword%")
                    ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);


        return view('pages.surat_keluar.kesiswaan.surat_rekomendasi_beasiswa.table_surat_rekomendasi_beasiswa')->with(['data' => $data]);
    }

    public function form_surat_rekomendasi_beasiswa()
    {
        return view('pages.surat_keluar.kesiswaan.surat_rekomendasi_beasiswa.form_surat_rekomendasi_beasiswa');
    }

    public function store_surat_rekomendasi_beasiswa(Request $request)
    {

        $kepalasekolah = User::where('role', 2)->first();
        $data = [

            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'golongan' => $request->golongan,
            'unitKerja' => $request->unitKerja,
            'namasiswa' => $request->namasiswa,
            'nisn' => $request->nisn,
            'asalSekolah' => $request->asalSekolah,
            'alamat' => $request->alamat,
            'namaProgram' => $request->namaProgram,
            'penyelenggara' => $request->penyelenggara,
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_rekomendasi_beasiswa', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_rekomendasi_beasiswa', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_rekomendasi_beasiswa.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_rekomendasi_beasiswa_acc.pdf';

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


        return redirect('siswa-surat-rekomendasi-beasiswa');
    }

    // Surat Rekom PTN
    public function surat_rekomendasi_ptn(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Rekom Ptn')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);


        return view('pages.surat_keluar.kesiswaan.surat_rekom_ptn.table_surat_rekomendasi_ptn')->with(['data' => $data]);
    }

    public function form_surat_rekomendasi_ptn()
    {
        return view('pages.surat_keluar.kesiswaan.surat_rekom_ptn.form_surat_rekomendasi_ptn');
    }

    public function store_surat_rekomendasi_ptn(Request $request)
    {

        $kepalasekolah = User::where('role', 2)->first();
        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'golongan' => $request->golongan,
            'unitKerja' => $request->unitKerja,
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'namaPtn' => $request->namaPtn,
            'jalurMasuk' => $request->jalurMasuk,
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,

        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_rekomendasi_ptn', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_rekomendasi_ptn', $data);
        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_rekomendasi_ptn.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_rekomendasi_ptn_acc.pdf';

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

        return redirect('siswa-surat-rekomendasi-ptn');
    }


    // surat Keterangan
    public function surat_keterangan(Request $request)
    {
        $keyword = $request->input('search');

        $data = keluar::where('tipe_surat', 'Surat Keterangan')->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('nomor_berkas', 'like', "%$keyword%")
                ->orWhere('alamat_penerima', 'like', "%$keyword%")
                ->orWhere('nomor_petunjuk', 'like', "%$keyword%")
                ->orWhere('nomor_paket', 'like', "%$keyword%")
                ->orWhere('perihal', 'like', "%$keyword%");
            });
        })->orderBy('tanggal', 'desc')->paginate(10);


        return view('pages.surat_keluar.kesiswaan.surat_keterangan.table_surat_keterangan')->with(['data' => $data]);
    }

    public function form_surat_keterangan()
    {
        return view('pages.surat_keluar.kesiswaan.surat_keterangan.form_surat_keterangan');
    }

    public function store_surat_keterangan(Request $request)
    {
        $kepalasekolah = User::where('role', 2)->first();

        $data = [
            'nomor_surat' => $request->nomor_surat,
            'tanggalSurat' => $request->tanggalSurat,
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'npsn' => $request->npsn,
            'kelasjurusan' => $request->kelasjurusan,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'nama_kepala' => $kepalasekolah->name,
            'nip_kepala' => $kepalasekolah->nip,
            'golongan_kepala' => $kepalasekolah->Golongan,
            'ttd_kepala' => $kepalasekolah->ttd,
        ];

        $pdf = Pdf::loadView('pages.surat_keluar.keluaran.tmpsurat_keterangan_siswa', $data);
        $pdfTtd = Pdf::loadView('pages.surat_keluar.keluaranttd.ttdsurat_keterangan_siswa', $data);

        $pdf->setPaper('a4');

        $filename = 'pdf_' . time() . 'surat_keterangan_siswa.pdf';
        $filenameTTD = 'pdf_' . time() . 'surat_keterangan_siswa_acc.pdf';

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

        return redirect('siswa-surat-keterangan');
    }
}
