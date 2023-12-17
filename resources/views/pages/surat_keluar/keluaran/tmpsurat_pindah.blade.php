<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .bg-red{
            background-color: red;
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

        table,
        th,
        td {
            padding: 5px;
            text-align: left;

            padding: 0
        }

        .susah {
            padding-left: 10px;
        }

        .signature {
            /* justify-content: space-between; */
            text-align: right;
        }

        .kota{
            margin-top: 0px;
            margin-bottom:1px;
            /* background-color: green; */
        }
        /* .garis{
            background-color: blue;

        } */
        .suratketerangan{
            /* background-color: red; */
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>


    <table style="width: 100%; margin:0;">
        <tr>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/LOGO PROVINSI GORONTALO.png') }}" width="90px">
            </td>
            <td style="text-align: center;">
                <h4>PEMERINTAH PROVINSI GORONTALO</h4>
                <h4>DINAS PENDIDIKAN, KEBUDAYAAN, PEMUDA DAN OLAHRAGA</h4>
                <h4>SEKOLAH MENENGAH KEJURUAN <br>
                    (SMK NEGERI 3 GORONTALO)</h4>
                <h5>Jl. Bali No. 2 Kelurahan Pulubala Kec. Kota Tengah <br>
                    No. Tlp 0435 823 276</h5>
                <h3 class="kota">KOTA GORONTALO</h3>
            </td>
            <td style="text-align: center;">
                <img src="{{ public_path('assets/img/TUT WURI HANDAYANI.png') }}" width="100px">
            </td>
        </tr>
    </table>

    {{-- <hr> --}}
    <div style="margin:2; padding:2;">
    <div style="border-width: 1.5px; border-style: solid; border-color: black; width:100% margin-top:0px;"></div>
    
    <div style="border-width: 0.5px; border-style: solid; border-color: black; margin-top: 2px; width:100%"></div>

    </div>
    
    <div class="header">
        <h2 class="suratketerangan" style="padding: 0; margin:0;"><span class="underline">SURAT KETERANGAN PINDAH</span></h2>
        <p style="margin:2; padding:2;">NOMOR : {{ $nomor_surat }}</p>
    </div>

        <div class="container">
            <p>DIBERIKAN KEPADA :</p>
            <div class="content" style="margin:0; paddin:0;" >
                <p><strong>A.Murid</strong></p>
                <table style="width:75%;  margin-top:-10px">
                    <tr>
                        <td>1.</td>

                        <td> Nama</td>
                        <td><strong>:{{ $nama_siswa }}</strong></td>
                    </tr>
                    
                    <tr>
                        <td>2.</td>
                        <td>Tempat/tanggal Lahir
                        <td>:{{ $ttl }}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Jenis Kelamin</td>
                        <td>:{{ $jeniskelamin }}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Agama</td>
                        <td>:{{ $agama }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Alamat</td>
                        <td>:{{ $alamat }}</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td> :Asal Sekolah/No.Tgl.STTB</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Setingkat lebih rendah</td>
                        <td>:{{ $asalSekolah }}</td>
                    </tr>


                    <tr>
                        <td>6.</td>
                        <td>Diterima disekolah ini</td>
                    </tr>
                    <tr>

                        <td>a.</td>
                        <td>Pada tanggal</td>

                        <td>:{{ $tanggalterima }}</td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Tingkat</td>
                        <td>{{ $tingkat }}</td>
                    </tr>


                    <tr>
                        <td>c.</td>
                        <td>Prodi</td>
                        <td>: {{ $prodi }}</td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>NISN</td>
                        <td>: {{ $nisn }}</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Dipindahkan dari sekoah ini</td>
                    </tr>
                    <tr>
                        <td>a.</td>
                        <td>Pada tanggal</td>
                        <td>:{{ $tanggalPindah }}</td>
                    </tr>
                    <tr>

                        <td>b.</td>
                        <td>Tingkat</td>

                        <td>:{{ $tingkatPindah }}</td>
                    </tr>



                    <tr>

                        <td>c.</td>
                        <td>Program Studi</td>

                        <td>:{{ $prodiPindah }}</td>
                    </tr>
                    <tr>

                        <td>d.</td>
                        <td>NISN</td>
                        <td>:{{ $nisn }}</td>
                    </tr>
                    <tr>

                        <td>e.</td>
                        <td>Sebabnya Keluar</td>

                        <td>: {{ $sebabKeluar }}</td>
                    </tr>


                    <tr>

                        <td>f.</td>
                        <td>Pindah ke sekolah</td>

                        <td>: {{ $pindahSekolah }}</td>
                    </tr>





                    <tr>
                        <td><strong>B.</strong></td>
                        <br>
                        <td><strong>Orang Tua/Wali</strong></td>
                    <tr>
                        <td>8.</td>
                        <td>Nama</td>
                        <td>: {{ $namaOrtu }}</td>
                    </tr>
                    <tr>

                        <td>a.</td>
                        <td>Pekerjaan</td>
                        <td>:{{ $pekerjaan }}</td>
                    </tr>
                    <tr>

                        <td>b.</td>
                        <td>Alamat</td>
                        <td>:{{ $alamatOrtu }} </td>

                    </tr>
                    <tr>

                        <td></td>
                        <td>Keterangan Lain Lain</td>
                        <td>:{{ $keterangan }}
                        </td>
                    </tr>

                    </tr>
                </table>
                <div class="signature">
                    <div>
                        @php
                        $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                        $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                    @endphp
                        <p>Gorontalo, {{ $tglSurat }}<br>
                            Kepala Sekolah<br>
                            <br><br>
                        <p><strong>{{ $nama_kepala }}</strong><br>

                            <strong>{{ $golongan_kepala }} </strong><br>
                            <strong>NIP. {{ $nip_kepala }}</strong> <br>
                    </div>
                </div>
            </div>
</body>

</html>
