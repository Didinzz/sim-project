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

        .tengah {
            text-align: center;
            flex-grow: 1;
            padding: 0 20px;
        }

        
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
            margin: 0 auto;
            padding: 0;
            background-color: rebeccapurple;

            border-radius: 5px;
        }

        .content {
            margin-bottom: 20px;
        }

        table {
             max-width: 600px;
            margin: 20px;
            margin-right: auto;
            margin-left: 10%;

            border-collapse: collapse;
            border-collapse: collapse;
            /* Menggabungkan border sel */
            border-spacing: 0;
        }

       

        th,
        td {
            text-align: left;
        }

        .signature {
            margin-top: 0px;
            text-align: right;
        }
    </style>

    </style>
</head>

<body>
    <table style="width: 100%; margin: 0; ">
        <tr>
            <td style="text-align: center; ">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
            <td style="text-align: center; padding-bottom: 0;">
                <h4>PEMERINTAH PROVINSI GORONTALO</h4>
                <h4 style="">DINAS PENDIDIKAN, KEBUDAYAAN, PEMUDA DAN OLAHRAGA</h4>
                <h4>SEKOLAH MENENGAH KEJURUAN <br>
                    (SMK NEGERI 3 GORONTALO)</h4>
                <h5 style="margin: 0;">Jl. Bali No. 2 Kelurahan Pulubala Kec. Kota Tengah <br>
                    No. Tlp 0435 823 276</h5>
                <h3 style="margin: 5px 0 2px; padding: 0; margin-top: 2px;">KOTA GORONTALO</h3>
            </td>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/TUT WURI HANDAYANI.png') }}" width="100px">
            </td>
        </tr>
    </table>
    <div
        style="margin: 10px 0 0px; padding: 0; border-width: 1.5px; border-style: solid; border-color: black; width: 100%; margin-top: 0px;">
    </div>
    <div
        style="margin: 10px 0 5px; padding: 0; border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width: 100%">
    </div>

    <div class="header" style="margin-bottom: 0; padding: 0; ">
        <h2 class="suratketerangan" style="padding: 0; margin:0;"><span class="underline">SURAT Rekomendasi</span></h2>
        <p style="margin:2; padding:2;">Nomor : {{ $nomor_surat }}</p>
    </div>

    <div class="container" style="padding: 0;">
        <div class="content">
            <p>Yang bertanda tangan dibawah ini Kepala SMK Negeri 3 Gorontalo dengan ini menugaskan kepada : </p>
            <table style="width: 56%; ">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $nama }}</td>
                </tr>

                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $nip }}</td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan</td>
                    <td>:</td>
                    <td>{{ $golongan }}</td>
                </tr>

                <tr>
                    <td> Jabatan </td>
                    <td>:</td>
                    <td>{{ $jabatan }}</td>
                </tr>

                <tr>
                    <td>Unit Kerja</td>
                    <td>:</td>
                    <td>{{ $unitKerja }}</td>
                </tr>
            </table>
            <p>Yang bertanda tangan di bawah ini Kepala SMK Negeri 3 Gorontalo dengan ini menerangkan bahwa :</p>
            {{-- <table style="width: 47%; float:left    ;">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> {{ $namasiswa }}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{ $nisn }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>:</td>
                    <td>{{ $asalSekolah }}</td>
                </tr>

                <tr>
                    <td> Alamat </td>
                    <td>:</td>
                    <td>{{ $alamat }}
                    </td>
                </tr>
            </table> --}}

            
            <table border="1" style="width:95%; margin:auto;">
                <tr style="padding:1px 1px;">
                    <td>NO</td>
                    <td>Nama</td>
                    <td>NISN</td>
                    <td> Jurusan</td>
                    <td>Prodi yang diplih</td>
                  </tr>
                    @foreach ($nama_siswa as $index => $siswa)
                  <tr style="padding:1px 1px;">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa }}</td>
                    <td>{{ $nisn[$index] }}</td>
                    <td>{{ $jurusan[$index] }}</td>
                    <td>{{ $prodi[$index] }}</td>
                  </tr>
                  @endforeach
                 
                </table>
             <p>Untuk mengikuti seleksi masuk perguruan tinggi STIKES Bina Mandiri Gorontalo melalui jalur Mandiri.</p>
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
