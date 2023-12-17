@extends('layouts.admin')
@section('title', 'Form Surat Rekomendasi Beasiswa')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Berkas Surat Keluar</h1>
        <form action="{{ route('store-siswa-surat-rekomendasi-beasiswa') }}" method="POST" enctype="multipart/form-data">
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
                        value="Surat Rekom Beasiswa">
                </div>

            </div>
            {{-- Surat Rekomendasi Beasiswa --}}

            <div class="broder-t-4 border-y-black pt-10">
                <hr class="font-bold broder-t-4 border-y-black dark:border-gray-300">

            </div>
            <div class="  w-full">
                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 dark:text-white">Surat Rekomendasi
                    Beasiswa</h2>

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
                            placeholder="Tanggal" required>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Data Guru
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">

                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nama Guru" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" name="nip" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="NIP" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pangkat/Golongan</label>
                        <input type="text" name="golongan" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Pangkat/Golongan" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" name="jabatan" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Jabatan" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                            Kerja</label>
                        <input type="text" name="unitKerja" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Unit Kerja" required>
                    </div>
                </div>
                <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Data Siswa
                </h2>
                <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="namasiswa" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nama Siswa" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                        <input type="text" name="nisn" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="NISN" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal
                            Sekolah</label>
                        <input type="text" name="asalSekolah" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Asal Sekolah" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" name="alamat" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Alamat" required>
                    </div>

                </div>
            </div>
            <hr class="font-bold broder-t-4 mt-4 border-y-black dark:border-gray-300">

            <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 mt-5 dark:text-white">Beasiswa
            </h2>
            <hr class="font-bold broder-t-4 mb-4 border-y-black dark:border-gray-300">

            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Program Beasiswa</label>
                    <input type="text" name="namaProgram" id="first-name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Nama Program Beasiswa" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="first-name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penyelenggara Beasiswa</label>
                    <input type="text" name="penyelenggara" id="first-name"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Penyelenggara Beasiswa" required>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-6 py-2 leading-5 text-white font-bold transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-800 focus:outline-none focus:bg-blue-600"><i
                        class="fa-solid fa-plus mr-1 mx-auto"></i>Buat Surat</button>
            </div>
            </div>
        </form>

    </section>
@endsection
