<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TUGAS HOME VISIT</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .kopsurat {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #000;
        }

        .logo {
            flex-shrink: 0;
        }

        .tengah {
            text-align: center;
            flex-grow: 1;
            padding: 0 20px;
        }

        h3,
        h4,
        h5 {
            margin: 3px 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .underline {
            border-bottom: 3px solid #000;
        }


        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;

            border-radius: 5px;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            max-width: 500px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            padding: 5px;
            text-align: left;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>

    </style>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
            <td style="text-align: center;">
                <h3>PEMERINTAH PROVINSI GORONTALO</h3>
                <h4>DINAS PENDIDIKAN, KEBUDAYAAN, PEMUDA DAN OLAHRAGA</h4>
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

    {{-- <hr> --}}
    <div style="border-width: 1.5px; border-style: solid; border-color: black; width:100%"></div>

    <div style="border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width:100%"></div>

    <div class="header">
        <h2><span class="underline">SURAT TUGAS</span></h2>
        <p>Nomor : {{ $nomor_surat }}</p>
    </div>

    <div class="container">
        <div class="content">
            <p>Yang bertanda tangan dibawah ini Kepala SMK Negeri 3 Gorontalo dengan ini menugaskan kepada : </p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $nama }}</td>
                </tr>
                <tr>
                    <td>NIP.</td>
                    <td>:</td>
                    <td> {{ $nip }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $jabatan }}</td>
                </tr>
            </table>
            <p>Untuk melaksanakan Home Visit ( Kunjungan ke rumah) orang tua/wali siswa :</p>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $namasiswa }}</td>
                </tr>
                <tr>
                    <td>Kelas/ Kompetensi Keahlian</td>
                    <td>:</td>
                    <td> {{ $kelas }} </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $alamat }}</td>
                </tr>
                <tr>
                    <td>Hari/Tanggal Kunjungan </td>
                    <td>:</td>
                    <td>{{ $tanggalKunjungan }}</td>
                </tr>
            </table>
            <p>
                Demikian surat tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.
            </p>
        </div>

        <div class="signature">
             @php
                    $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                    $tglSurat = $convertdate->format('d F Y');
                @endphp
            <p>Gorontalo, {{ $tglSurat }} <br>
                Kepala SMK Negeri 3 Gorontalo <br>
                <br><br><br>
            <p>ISHAK A. PIU, S.Pd <br>
                Pembina Tkt. I <br>
                NIP. 197207201997021001 <br>
        </div>
</body>

</html>
