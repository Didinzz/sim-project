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
            /* flex-grow: 1; */
            padding: 0 20px;
        }

        h3,
        h4,
        h5 {
            margin: 3px 0;
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
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>

<body>

    {{-- <table style="width: 100%;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
            <td style="text-align: center; width:100%; margin-bottom:0px">
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
    </table> --}}
    <table style="width: 100%;">
        <tr style="margin-bottom: 1px">
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
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

    <div style="border-width: 1.5px; border-style: solid; border-color: black; width:100%; margin-top: 0px;"></div>

    <div style="border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width:100%"></div>

    <div class="header">
        <h4><span class="underline">SURAT PERMOHONAN</span></h2>
            <p>NOMOR : {{ $nomor_surat }}</p>
    </div>

    <div class="container">
        <div class="content">
            <p>Kepada : <br>
                Yth. Gubernur Gorontalo <br>
                Di <br>
                Gorontalo </p>
            <p>1. Yang bertanda tangan dibawah ini :</p>
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
                <tr>
                    <td>Unit Organisasi </td>
                    <td>:</td>
                    <td>{{ $unit }}</td>
                </tr>
                <tr>
                    <td>Alamat Rumah</td>
                    <td>:</td>
                    <td>{{ $alamat }} </td>
                </tr>
            </table>
            <p>{{ $keterangan }}
            </p>

            {{-- <div class="signature">
            <div>
                <p>Mengetahui,<br>
                Kepala Dinas Pendidikan Kebudayaan <br>
                Pemuda dan Olahraga Provinsi Gorontalo <br>
                <br><br><br>
                <p>Dr. Wahyudin A. Katili, S.STP.MT <br>
                Pembina Utama Madya IV/D <br>
                NIP. 19770625 199612 1 001 <br> 
            </div>
            <div>
                <p>Gorontalo, 18 Januari 2022 <br>
                Yang Membuat Permohonan <br>
                <br><br><br><br><br>
                <p>Dra. Hj. Sutrisna Karim <br>
                Pembina Tingkat I/IV B <br>
                NIP. 19640930 198803 2 009 <br>
            </div>
    </div> --}}
            <table style="width: 100%;">
                <tr>
                    <td style="width: 200px; vertical-align: top; margin: 0; padding: 0;">
                        <p>Mengetahui,</p>
                        Kepala Sekolah</p>
                        <p style="margin: 0;"><strong>{{ $nama_kepala }}</strong></p>
                        <br>
                        <p>{{ $golongan_kepala }} </p>
                        <p style="margin: 0;">NIP. {{ $nip_kepala }}</p>
                    </td>
                    <td style="width: 150px;padding-left: 5%; vertical-align: top;">
                        @php
                            $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                            $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                        @endphp
                        <p>Gorontalo,{{ $tglSurat }} <br>
                            Yang Membuat Permohonan <br>
                            <br><br>
                        <p>{{ $nama }} <br>
                            {{ $golongan }} <br>
                            NIP. {{ $nip }} <br>
                    </td>
                </tr>
            </table>
        </div>
</body>

</html>
