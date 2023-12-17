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
            border-radius: 5px;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        {
        padding: 5px;
        text-align: left;
        }

        .td1 {
            padding-right: 2px;
            padding-top: 5px;
            /* Atur padding-right untuk mengurangi jarak */
        }

        .signature {
            justify-content: space-between;
            text-align: right;
            margin-top: 20px;
        }
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

    <div style="border-width: 1.5px; border-style: solid; border-color: black; width:100%; margin-top: 10px;"></div>

    <div style="border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width:100%"></div>

    <div class="header">
        <h3><span class="underline">SURAT KETERANGAN</span></h3>
        <p>NOMOR : {{ $nomor_surat }}</p>
    </div>

    <div class="container">
        <div class="content">
            <p>Yang bertanda tangan di bawah ini Kepala SMK Negeri 3 Gorontalo dengan ini menerangkan bahwa :</p>
            <table>
                <tr>
                    <td class="td1">Nama</td>
                    <td>:</td>
                    <td> {{ $nama }}</td>
                </tr>
                <tr>
                    <td class="td1">NISN</td>
                    <td>:</td>
                    <td>{{ $nisn }}</td>
                </tr>
                <tr>
                    <td class="td1">NPSN</td>
                    <td>:</td>
                    <td>{{ $npsn }}</td>
                </tr>
                <tr>
                    <td class="td1">Kelas / Jurusan </td>
                    <td>:</td>
                    <td>{{ $kelasjurusan }}</td>
                </tr>
                <tr>
                    <td class="td1">Tempat/Tanggal Lahir </td>
                    <td>:</td>
                    <td>{{ $ttl }}</td>
                </tr>
                <tr>
                    <td class="td1">Alamat</td>
                    <td>:</td>
                    <td>{{ $alamat }}</td>
                </tr>
            </table>
            <p>
                @php
                    $teks = preg_replace('/\*(.*?)\*/s', '<strong>$1</strong>', $keterangan);
                @endphp
                {!! $teks !!}
            </p>
            <p>Demikian surat keterangan ini dibuat, untuk digunakan sebagaimana mestinya.</p>
            <br>
            <div class="signature">
                @php
                    $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                    $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                @endphp
                <p>Gorontalo, {{ $tglSurat }} <br>
                    Kepala SMK Negeri 3 Gorontalo <br>
                    <br><br><br>
                <p>{{ $nama_kepala }} <br>
                    {{ $golongan_kepala }} <br>
                    NIP. {{ $nip_kepala }} <br>
            </div>
        </div>
    </div>
</body>

</html>
