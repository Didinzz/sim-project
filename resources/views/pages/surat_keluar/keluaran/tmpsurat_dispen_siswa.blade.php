<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .tengah {
            text-align: center;
            padding: 0 20px;
        }

        h3,
        h4,
        h5 {
            margin: 5px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .underline {
            border-bottom: 3px solid #000;
        }

        .container {
            max-width: 600px;
            margin: 5px auto;
            border-radius: 5px;
        }

        .content {
            margin-bottom: 3px;
        }

        .table-type-1 {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table-type-1 th{
            border: 1px solid #000000;
            
            padding: 0;
            text-align: center;

        }
        .table-type-1 td {
            border-right: 1px solid #000000;
            border-left: 1px solid #000000;
            padding: 0;
            text-align: center;
        }

       

        .table-type-2 {
            width: 80%;
            max-width: 500px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        .table-type-2 th,
        .table-type-2 td {
            padding: 5px;
            text-align: left;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        hr {
            border: 1px solid #000;
            margin-bottom: 40px;
        }
    </style>
</head>

<body>

    <table style="width: 100%;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ ('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
            <td style="text-align: center;">
                <h3>PEMERINTAH PROVINSI GORONTALO</h3>
                <h3>DINAS PENDIDIKAN DAN KEBUDAYAAN</h3>
                <h4>SEKOLAH MENENGAH KEJURUAN <br>
                    (SMK NEGERI 3 GORONTALO)</h4>
                <h5>Jl. Bali No. 2 Kelurahan Pulubala Kec. Kota Tengah <br>
                    No. Tlp 0435 823 276</h5>
                <h3>KOTA GORONTALO</h3>
            </td>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/TUT WURI HANDAYANI.png') }}" width="100px">
            </td>
        </tr>
    </table>

    <div style="border-width: 1.5px; border-style: solid; border-color: black; width:100%"></div>

    <div style="border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width:100%"></div>

    <div class="header">
        <h3><span class="underline">SURAT DISPENSASI</span></h3>
        <p>Nomor : {{ $nomor_surat }}</p>
    </div>
    <div class="container">
        <div class="content">
            <p>Berdasarkan Surat dari {{ $SuratDari }}, tanggal {{ $date_perihal }} dengan nomor :
                {{ $nomor_perihal }} Perihal {{ $perihal }} Maka dengan ini Kepala SMK Negeri 3 Gorontalo
                Memberikan Surat Dispensasi kepada :</p>

            <table class="table-type-1">
                <thead>
                    <tr>
                        <th style="text-align: center" >No.</th>
                        <th style="text-align: center">Nama</th>
                        <th style="text-align: center">Kelas/Jurusan</th>
                        <th style="text-align: center">Asal Sekolah</th>
                    </tr>
                </thead>
                <tbody style="border-left: 1px solid #000;border-bottom: 1px solid #000;">
                    @foreach ($nama_siswa as $index => $siswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $siswa }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $kelas_siswa[$index] }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $asalSekolah[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p>Untuk Mengikuti Kegiatan {{ $perihal }}Tahun {{ $tahun }} di {{ $tempat_dilaksanakan }},
                yang dilaksanakan pada :</p>

            <table class="table-type-2">
                <tr>
                    <td>Hari/Tanggal</td>
                    <td>:</td>
                    <td>{{ $tgl_dilaksanakan }}</td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td>:</td>
                    <td>{{ $waktu_dilaksanakan }}</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td>{{ $tempat_dilaksanakan }}</td>
                </tr>
            </table>

            <p>Demikian surat dispensasi ini diberikan untuk dipergunakan seperlunya.</p>

            <div class="signature">
                @php
                    $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                    $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                @endphp
                <p>Gorontalo, {{ $tglSurat }} <br>
                    Kepala SMK Negeri 3 Gorontalo <br>
                    <br><br><br>
                </p>
                <p>{{ $nama_kepala }} <br>
                    {{ $golongan_kepala }} <br>
                    NIP. {{ $nip_kepala }} <br>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
