@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Berkas Surat Keluar</h1>
        <form action="{{ route('store-siswa-surat-keterangan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Nomor
                        Berkas</label>
                    <input id="username" name="nomor_berkas" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="emailAddress">Alamat
                        Penerima</label>
                    <input id="emailAddress" name="penerima" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Tanggal
                        Surat</label>
                    <input id="date" name="tanggal" type="date" min="{{ now()->format('Y-m-d') }}"
                        value="{{ now()->format('Y-m-d') }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Perihal</label>
                    <input id="passwordConfirmation" name="perihal" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Nomor Petunjuk</label>
                    <input id="passwordConfirmation" name="petunjuk" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="passwordConfirmation">Nomor Paket</label>
                    <input id="passwordConfirmation" name="nomor_paket" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50  border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600  focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>

                 <div class="col-span-6 sm:col-span-3 hidden">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="emailAddress">Tipe Surat</label>
                    <input id="text" name="tipeSurat" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring" value="surat keterangan">
                </div>
                
            </div>


            {{-- Surat Keterangan --}}

            <div class="broder-t-4 border-y-black pt-10">
                <hr class="font-bold broder-t-4 border-y-black dark:border-gray-300">

            </div>
            <div class=" p-6 w-70">
                <h2 class="text-2xl font-bold text-black text-center capitalize mb-5 dark:text-white">Surat Keterangan
                </h2>

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                            Surat</label>
                        <input type="text" name="nomor_surat" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Surat Dari" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Surat Dari" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                        <input type="text" name="nisn" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Surat Dari" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NPSN</label>
                        <input type="text" name="npsn" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Surat Dari" required>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas/Jurusan</label>
                        <input type="text" name="kelasjurusan" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nomor Surat" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat/Tanggal
                            Lahir</label>
                        <input type="text" name="ttl" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nomor Surat" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <input type="text" name="alamat" id="first-name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nomor Surat" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="emailAddress">Tangal Surat</label>
                        <input id="text" name="tanggalSuratKeluar" type="date" min="{{ now()->format('Y-m-d') }}"
                            value="{{ now()->format('Y-m-d') }}"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring"
                            value="SuratCuti" required>
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for="catatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan
                            </label>
                        <textarea name="keterangan"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            id="catatan" cols="10" rows="3"
                            required>Bahwa nama di atas adalah benar - benar siswa SMK Negeri 3 Gorontalo dan Aktif
menempuh pendidikan sampai dengan saat ini, Tahun Pelajaran 2022/2023.</textarea>
                    </div>
                </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white font-bold transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </div>
        </form>

    </section>
@endsection
