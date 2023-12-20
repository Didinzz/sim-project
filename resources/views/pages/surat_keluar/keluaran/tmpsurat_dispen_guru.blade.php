<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .bg-red {
            background-color: red;
        }

        .bg-blue {
            background-color: blue;
        }

        .bg-gree {
            background-color: green;
        }

        body {
            font-family: Arial, sans-serif;
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
            margin-bottom: 0px;
            margin: 0;
            padding: 0;
            /* background-color: yellow;            */
            /* height: 70px; */
        }

        .underline {
            border-bottom: 3px solid #000;

        }


        .container {
            max-width: 600px;
            margin: 0px auto;
            padding: 0;
            border-radius: 5px;
        }

        .content {
            margin-bottom: 20px;
            margin-top: 0;
        }

        table {

            max-width: 600px;
            margin: 20px;
            border-collapse: collapse;
            border-collapse: collapse;
            /* Menggabungkan border sel */
            border-spacing: 0;
            /* Mengatur jarak antar sel menjadi 0 */
        }

        th,
        td {
            /* padding: 5px; */
            text-align: left;

            padding: 0
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




        .signature {
            /* justify-content: space-between; */
            text-align: right;
        }
    </style>
</head>

<body>

    <table style="width: 100%; margin: 0;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
             <td style="text-align: center; padding-bottom: 0;">
                <h3 style=" margin-bottom:2;">PEMERINTAH PROVINSI GORONTALO</h3>
                <h3 style=" margin: auto 2;">DINAS PENDIDIKAN DAN KEBUDAYAAN</h3>
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



    <div class="header">
        <h2 class="suratketerangan" style="padding: 0; margin:0;"><span class="underline">SURAT DISPENSASI</span></h2>
        <p style="margin:2; padding:2;">NOMOR : {{ $nomor_surat }}</p>
    </div>

    <div class="container">
        <div class="content">
            <p>Yang bertanda tangan di bawah ini Kepala SMK Negeri 3 Gorontalo dengan ini menerangkan bahwa :</p>
            {{-- <table border="1" style="width: 100%; padding: 2px 0px;">
                <tr>
                    <td><strong>No</strong> </td>
                    <td><strong>Nama</strong></td>
                    <td><strong>Sekolah</strong></td>
                    <td><strong>Utusan</strong></td>
                </tr>
                @foreach ($nama_guru as $index => $guru)
                    <tr>
                        <td style="margin-bottom: 5px;">{{ $loop->iteration }}</td>
                        <td style="margin-bottom: 5px;">{{ $guru }}</td>
                        <td style="margin-bottom: 5px;">{{ $sekolah[$index] }}</td>
                        <td style="margin-bottom: 5px;">{{ $utusan[$index] }}</td>
                    </tr>
                @endforeach
            </table> --}}
            
            {{--  --}}
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
                    @foreach ($nama_guru as $index => $guru)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guru }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $sekolah[$index] }}</td>
                            <td style="border-right: 1px solid #000; text-align: center;">{{ $utusan[$index] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            {{-- {{ $perihalKegiatan }} --}}
            <p>{{ $perihalKegiatan }}</p>
            <p>Demikian surat keterangan ini dibuat, untuk digunakan sebagaimana seperlunya.</p>
            <br>
            <div class="signature">
                <div>
                     @php
                            $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                            $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                        @endphp
                    <p>Gorontalo, {{ $tglSurat }}<br>
                        Kepala Sekolah<br>
                        <br><br><br><br><br>
                    <p><Strong>{{ $nama_kepala }}</Strong><br>
                        {{ $golongan_kepala }} </p>
                       <p> NIP. {{ $nip_kepala }}</p> 

                </div>
            </div>
        </div>
</body>

</html>
