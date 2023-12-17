@extends('layouts.admin')
@section('title', 'Form Surat Pindah')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Berkas Surat Keluar</h1>
        <form action="{{ route('store-siswa-surat-pindah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Nomor
                        Berkas</label>
                    <input id="username" name="nomor_berkas" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring"
                        required placeholder="Nomor Berkas">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="emailAddress">Alamat
                        Penerima</label>
                    <input id="emailAddress" name="penerima" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring"
                        required placeholder="Alamat Penerima">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Tanggal
                        Surat</label>
                    <input required id="date" name="tanggal" type="date" min="{{ now()->format('Y-m-d') }}"
                        value="{{ now()->format('Y-m-d') }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Perihal</label>
                    <input required id="passwordConfirmation" name="perihal" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        placeholder="Perihal">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Nomor Petunjuk</label>
                    <input required id="passwordConfirmation" name="petunjuk" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        placeholder="Nomor Petunjuk">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Nomor Paket</label>
                    <input required id="passwordConfirmation" name="nomor_paket" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring"
                        placeholder="Nomro Paket">
                </div>

                <div class="col-span-6 sm:col-span-3 hidden">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="emailAddress">Tipe
                        Surat</label>
                    <input id="text" name="tipeSurat" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring"
                        value="Surat Pindah">
                </div>

            </div>
            {{-- Surat Pindah --}}

            <div class="broder-t-4 border-y-black pt-10">
                <hr class="font-bold broder-t-4 border-y-black dark:border-gray-300">

            </div>
            <div class=" p-6 w-70">
                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 dark:text-white">Surat Keterangan Pindah
                </h2>

                <hr class="font-bold broder-t-4 mb-2 border-y-black dark:border-gray-300">

                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Surat</label>
                        <input type="text" name="nomor_surat" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nomor Surat" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Surat</label>
                        <input type="date" name="tanggalSurat" id="first-name" min="{{ now()->format('Y-m-d') }}"
                            value="{{ now()->format('Y-m-d') }}"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Tanggal Surat" required>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Data Siswa
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">

                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-8">
                        <div id="Container">
                            <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                                <div class="w-full">
                                    <label for="nama_siswa_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="nama_siswa"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama Siswa" required>
                                </div>
                                <div class="w-full">
                                    <label for="kelas_siswa_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Tanggal
                                        lahir</label>
                                    <input type="text" name="ttl"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 w-full border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Tempat/Tanggal Lahir" required>
                                </div>

                                <div class="w-full">
                                    <label for="keterangan_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin</label>
                                    <input type="text" name="jeniskelamin"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Jenis Kelamin" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-8">
                        <div id="Container">
                            <div class="sm:flex justify-stretch gap-4" id="inputGroup1">

                                <div class="w-full">
                                    <label for="nama_siswa_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">agama</label>
                                    <input type="text" name="agama"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Agama" required>
                                </div>
                                <div class="w-full">
                                    <label for="kelas_siswa_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <input type="text" name="alamat"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 w-full border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Alamat" required>
                                </div>
                                <div class="w-full">
                                    <label for="keterangan_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah/
                                        Setingkat lebih rendah</label>
                                    <input type="text" name="asalSekolah"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Asal Sekolah" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Diterima Disekolah
                    ini
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">
                <div class="col-span-6 sm:col-span-8">
                    <div id="Container">
                        <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Diterima</label>
                                <input type="text" name="tanggalterima"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Tanggal Diterima" required>
                            </div>
                            <div class="w-full">
                                <label for="nama_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                                <input type="text" name="tingkat"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Tingkat" required>
                            </div>
                            <div class="w-full">
                                <label for="kelas_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                                    Studi</label>
                                <input type="text" name="prodi"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 w-full border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Program Studi" required>
                            </div>
                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                                <input type="text" name="nisn"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="NISN" required>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Dipindahkan Dari
                    Sekolah Ini
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">
                <div class="col-span-6 sm:col-span-8">
                    <div id="Container">
                        <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Pindah</label>
                                <input type="text" name="tanggalPindah"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Tanggal Pindah" required>
                            </div>
                            <div class="w-full">
                                <label for="nama_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                                <input type="text" name="tingkatPindah"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Tingkat" required>
                            </div>
                            <div class="w-full">
                                <label for="kelas_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Program
                                    Studi</label>
                                <input type="text" name="prodiPindah"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 w-full border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Program Studi" required>
                            </div>
                        </div>
                        <div class="sm:flex justify-stretch gap-4 mt-2" id="inputGroup1">

                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sebabnya
                                    Keluar</label>
                                <input type="text" name="sebabKeluar"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Sebabnya Keluar" required>
                            </div>

                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pindah Ke
                                    Sekolah</label>
                                <input type="text" name="pindahSekolah"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Pindah Ke Sekolah" required>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Data Orang Tua
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">
                <div class="col-span-6 sm:col-span-8">
                    <div id="Container">
                        <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="namaOrtu"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nama Orang Tua" required>
                            </div>
                            <div class="w-full">
                                <label for="nama_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <input type="text" name="alamatOrtu"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Alamat" required>
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="nama_siswa_1"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                            <input type="text" name="pekerjaan"
                                class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Pekerjaan" required>
                        </div>
                    </div>
                    <div class="sm:flex justify-stretch gap-4 mt-2" id="inputGroup1">

                        <div class="w-full">
                            <label for="catatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan Lain
                                Lain
                            </label>
                            <textarea name="keterangan"
                                class="shadow-sm bg-gray-50 border h-40 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                id="catatan" cols="10" rows="3" required> </textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white font-bold transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-800 focus:outline-none focus:bg-blue-600"><i
                        class="fa-solid fa-plus mr-1 mx-auto"></i>Buat Surat</button>
            </div>
        </form>

    </section>
@endsection
