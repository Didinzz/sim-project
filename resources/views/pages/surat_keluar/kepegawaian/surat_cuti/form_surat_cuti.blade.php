@extends('layouts.admin')
@section('title', 'Form Surat Cuti')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Berkas Surat Keluar</h1>
        <form action="{{ route('store-pegawai-surat-cuti') }}" method="POST" enctype="multipart/form-data">
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
                        value="Surat Cuti">
                </div>

            </div>


            {{-- Surat Cuti --}}

            <div class="broder-t-4 border-y-black pt-10">
                <hr class="font-bold broder-t-4 border-y-black dark:border-gray-300">

            </div>
            <div class=" w-full">
                <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 dark:text-white">Surat Cuti
                </h2>

                <hr class="font-bold broder-t-4 mb-2 border-y-black dark:border-gray-300">


                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-8">
                        <div id="Container">
                            <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                                <div class="w-full">
                                    <label for="nama_siswa_1"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Surat</label>
                                    <input type="date" name="tanggalSurat" min="{{ now()->format('Y-m-d') }}"
                                        value="{{ now()->format('Y-m-d') }}"
                                        class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama Siswa" required>
                                </div>
                            </div>

                            <hr class="font-bold broder-t-4 mb-2 mt-5 border-y-black dark:border-gray-300">

                            <h2 class="text-2xl font-bold text-black text-left capitalize mb-5 dark:text-white">Data
                                Pegawai
                            </h2>
                            <hr class="font-bold broder-t-4 mb-2 border-y-black dark:border-gray-300">
                            <div class="grid grid-cols-6 gap-6">


                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="nama_guru" id="first-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nama" required>
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
                                    <input type="text" name="pangkatGolongan" id="first-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Pangkat Golongan" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                                    <input type="text" name="jabatan" id="first-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Jabatan" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satuan
                                        Kerja</label>
                                    <input type="text" name="satuanKerja" id="first-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Satuan Kerja" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                        HP</label>
                                    <input type="text" name="noHP" id="first-name"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Nomor Handphone" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tgl_diterima"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Mulai Cuti</label>
                                    <input type="text" name="tanggal_mulai_cuti" id="tgl_diterima"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required placeholder="Tanggal Mulai Cuti">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="tgl_diterima"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Akhir Cuti</label>
                                    <input type="text" name="tanggal_akhir_cuti" id="tgl_diterima"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required placeholder="Tanggal Akhir Cuti">
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <label for="catatan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan
                                        Cuti</label>
                                    <textarea name="alasan" `
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        id="catatan" cols="10" rows="3" required></textarea>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6">
                                <button
                                    class="px-6 py-2 leading-5 text-white font-bold transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-800 focus:outline-none focus:blue-gray-600"><i
                                        class="fa-solid fa-plus mr-1 mx-auto"></i>Buat Surat</button>
                            </div>
                        </div>
        </form>

    </section>
@endsection
