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

         .table2 th{
            border: 1px solid #000000;
            
            padding: 0;
            text-align: center;

        }
        
         .table2 td {
            border-right: 1px solid #000000;
            border-left: 1px solid #000000;
            padding: 0;
            text-align: center;
        }

        .signature {
            text-align: right;
            margin-top: 20px;
        }

        .signature img {
            width: 8rem;
            background-color: red;
            display: block;
            margin: 0 auto;
            margin-top: 10px;
            /* Memberi jarak dari teks */
        }

        .signature p {
            margin: 0;
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


            <table class="table2" style="width:95%; margin:auto;">
                <thead>

                    <tr>
                        <th  style="text-align: center">NO</th>
                        <th  style="text-align: center">Nama</th>
                        <th  style="text-align: center">NISN</th>
                        <th  style="text-align: center"> Jurusan</th>
                        <th  style="text-align: center">Prodi yang diplih</th>
                    </tr>
                </thead>
                <tbody style="border-left: 1px solid #000;border-bottom: 1px solid #000;">

                    @foreach ($nama_siswa as $index => $siswa)
                        <tr style="padding:1px 1px;">
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $loop->iteration }}.</td>
                            <td>{{ $siswa }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $nisn[$index] }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $jurusan[$index] }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $prodi[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <p>Untuk mengikuti seleksi masuk perguruan tinggi STIKES Bina Mandiri Gorontalo melalui jalur Mandiri.</p>
            Demikian surat tugas ini dibuat untuk dilaksanakan sebagaimana mestinya.
            </p>
        </div>

       <div class="signature">
            @php
                $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                $tglSurat = $convertdate->isoformat('D MMMM YYYY');
            @endphp
            <p>Gorontalo, {{ $tglSurat }} <br>
                Kepala SMK Negeri 3 Gorontalo <br>
            </p>
            <img src="{{ public_path('storage/' . $ttd_kepala) }}" alt="">

            <p>{{ $nama_kepala }} <br>
                {{ $golongan_kepala }} <br>
                NIP. {{ $nip_kepala }} <br>
        </div>
</body>

</html>
