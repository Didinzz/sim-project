<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Permohonan Cuti</title>
    <style>
      body {
        font-family: "Times New Roman", Times, serif;
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

     .table1 {
        width: 80%;
        max-width: 200px;
        margin: 0 auto;
        border-collapse: collapse;
      }

      .table1,
      th,
      .td1 {
        padding: 5px;
        text-align: left;
      }
      .signature {
        margin-top: 40px;
      }
    </style>
  </head>
  <body>
    <div class="container" >
      <div class="content">
        <p>
          Hal : Permohonan Cuti <br />
          Lamp: Berkas
        </p>

        <p>
          Kepada<br />
          Yth. Kepala Dinas Pendidikan, Kebudayaan, Pemuda dan Olahraga Provinsi
          Gorontalo<br />
          Di - <br />
          Tempat
        </p>

        <p>Yang bertanda tangan dibawah ini :</p>
        <table class="table1">
          <tr>
            <td class="td1">Nama</td>
            <td class="td1">:</td>
            <td class="td1">{{ $nama_guru }}</td>
          </tr>
          <tr>
            <td class="td1">NIP.</td>
            <td class="td1">:</td>
            <td class="td1">{{ $nip }}</td>
          </tr>
          <tr>
            <td class="td1">Pangkat/Golongan</td>
            <td class="td1">:</td>
            <td class="td1">{{ $pangkatGolongan }}</td>
          </tr>
          <tr>
            <td class="td1">Jabatan</td>
            <td class="td1">:</td>
            <td class="td1">{{$jabatan}}</td>
          </tr>
          <tr>
            <td class="td1">Satuan Kerja</td>
            <td class="td1">:</td>
            <td class="td1">{{ $satuanKerja }}</td>
          </tr>
          <tr>
            <td class="td1">No Hp</td>
            <td class="td1">:</td>
            <td class="td1">{{ $noHP }}</td>
          </tr>
        </table>
        <p>
          Dengan ini mengajukan Permohonan Cuti terhitung mulai tanggal {{ $tanggal_mulai_cuti }} sampai dengan {{ $tanggal_akhir_cuti }} dengan alasan
           @php
        $teks = preg_replace('/\*(.*?)\*/s', '<strong>$1</strong>', $alasan);
    @endphp
     {!! $teks !!}
        </p>
      </div>

      <p>
        Demikian surat permohonan ini dibuat, atas perhatian dan terkabulnya
        permohonan ini diucapkan terima kasih
      </p>
      <!-- <div style="width: 100%;"> -->
        <table style="width: 100%;">
          <tr>
            <td style="width: 250px; vertical-align: top;">
                <p>Mengetahui,</p>
                <p>Kepala SMK Negeri 3 Gorontalo</p>
                <br /><br /><br /><br />
                <p>{{ $nama_kepala }}</p>
                <p>{{ $golongan_kepala }}</p>
                <p>NIP: {{ $nip_kepala }}</p>
            </td>
            <td style="width: 150px;padding-left: 5%; vertical-align: top;">
              @php
                    $convertdate = \Carbon\Carbon::createFromFormat('Y-m-d', $tanggalSurat);
                    $tglSurat = $convertdate->isoformat('D MMMM YYYY');
                @endphp
                <p>Gorontalo, {{ $tglSurat }}</p>
                <p>Yang Bermohon</p>
                <br /><br /><br /><br />
                <p>{{ $nama_guru }}</p>
                <p>NIP: {{ $nip }}</p>
            </td>
          </tr>
        </table>
      <!-- </div> -->
    </div>
  </body>
</html>
