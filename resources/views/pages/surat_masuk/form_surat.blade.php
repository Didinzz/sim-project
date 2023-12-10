@extends('layouts.admin')
@section('title', 'Dashboard')
@section('suratmasuk', 'bg-gray-100 dark:bg-gray-700')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Surat Masuk</h1>
        <form action="{{ url('store_surat_masuk') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="username">Nomor Berkas</label>
                    <input id="username" name="nomor_berkas" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="emailAddress">Alamat Pengirim</label>
                    <input id="emailAddress" name="pengirim" type="text" 
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-slate-500  focus:outline-none focus:ring">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Tanggal Surat</label>
                    <input id="date" name="tanggal" type="date" min="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" >
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="passwordConfirmation">Nomor Surat</label>
                    <input id="passwordConfirmation" name="nomor_surat" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="passwordConfirmation">Perihal</label>
                    <input id="passwordConfirmation" name="perihal" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="passwordConfirmation">Nomor Petunjuk</label>
                    <input id="passwordConfirmation" name="petunjuk" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="passwordConfirmation">Nomor Paket</label>
                    <input id="passwordConfirmation" name="nomor_paket" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-gray-50  border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600  focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Upload Surat Masuk
                    </label>
                    <div class="col-span-4 sm:col-span-3">
                        <input type="file" name="fileberkas"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 "
                            placeholder=" Upload File" required>


                    </div>
                </div>

            </div>


            {{-- lembar disoposisi --}}

            <div class="broder-t-4 border-y-black pt-10">
                <hr class="font-bold broder-t-4 border-y-black dark:border-gray-300">

            </div>
            <div class=" p-6 w-70">
                <h2 class="text-2xl font-bold text-black text-center capitalize mb-5 dark:text-white">Lembar
                    Disposisi
                </h2>

               <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surat Dari</label>
                                <input type="text" name="surat_dari" id="first-name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Surat Dari" required>
                            </div>
                            {{-- <div class="col-span-6 sm:col-span-3">
                                <label for="tgl_surat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tgl Surat</label>
                                <input type="date" name="tgl_surat" id="tgl_surat"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div> --}}
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    Surat</label>
                                <input type="text" name="nomor_surat" id="first-name"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nomor Surat" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tgl_diterima"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diterima
                                    Tanggal</label>
                                <input type="date" name="tgl_diterima" id="tgl_diterima" min="{{ now()->format('Y-m-d') }}" value="{{ now()->format('Y-m-d') }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nomor_agenda"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                    Agenda</label>
                                <input type="text" name="nomor_agenda" id="nomor_agenda"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nomor Agenda">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="category-create"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sifat</label>
                                <select id="category-create" name="sifat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Silahkan Pilih</option>
                                    <option value="0">Sangat Segera</option>
                                    <option value="1">Segera</option>
                                    <option value="2">Rahasia</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="hal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hal</label>
                                <input type="text" name="hal" id="hal"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Hal" required>
                            </div>

                            <div class="col-span-6 sm:col-span-6">
                                <label for="catatan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                <textarea name="catatan"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    id="catatan" cols="10" rows="3" required></textarea>
                            </div>


                            <div class="col-span-6 sm:col-span-3">
                                <label for="category-create"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diteruskan Kepada
                                    Sdr</label>
                                <div class="flex items-center mb-4">
                                    <input id="inpkasubag" name="kasubag" type="checkbox" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkasubag"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kasubag
                                        TU</label>
                                </div>
                                <input type="text" name="valkasubag" id="kasubag-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Kasubag TU" value="">
                                <div class="flex items-center mb-4">
                                    <input id="inpwaksek" name="waksek" type="checkbox" value="2"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpwaksek"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Waksek</label>
                                </div>
                                <input type="text" name="valwaksek" id="waksek-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Waksek" value="">
                                <div class="flex items-center mb-4">
                                    <input id="inpkaprodi" name="kapordi" type="checkbox" value="3"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkaprodi"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ka
                                        Prog.Keahl</label>
                                </div>
                                <input type="text" name="valkapordi" id="kaprodi-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Ka Prog.Keahl" value="">
                                <div class="flex items-center mb-4">
                                    <input id="inpkoordinator" name="koordinator" type="checkbox" value="4"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkoordinator"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Koordinator</label>
                                </div>
                                <input type="text" name="valkoordinator" id="koordinator-input"
                                    class="shadow-sm hidden bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Koordinator" value="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="category-create"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dengan Hormat
                                    Harap</label>

                                <div class="flex items-center mb-4">
                                    <input id="inpsaran" name="tanggapan" type="checkbox" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onchange="updateValtanggapan(this)">
                                    <label for="inpsaran"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggapan Dan
                                        Saran</label>
                                    <input type="hidden" id="valtanggapan" name="valtanggapan" value="">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inplanjut" name="prosesLebih" type="checkbox" value="2"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onchange="updateValProsesLebih(this)">
                                    <label for="inplanjut"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Proses Lebih
                                        Lanjut</label>
                                    <input type="hidden" id="valprosesLebih" name="valprosesLebih" value="">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inpkonfirmasikan" name="koordinasi" type="checkbox" value="3"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        onchange="updateValKoordinasi(this)">
                                    <label for="inpkonfirmasikan"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Koordinasi/Konfirmasikan</label>
                                    <input type="hidden" id="valkoordinasi" name="valkoordinasi" value="">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inplainnya" name="lainnya" type="checkbox" value="4"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inplainnya"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lainnya</label>
                                </div>
                                <input type="text" name="vallainnya" id="lainnya-input"
                                    class="shadow-sm hidden bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Lainnya">
                            </div>


                            {{-- <div class="col-span-6 sm:col-span-3">
                                <label for="category-create"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diteruskan Kepada
                                    Sdr</label>
                                <div class="flex items-center mb-4">
                                    <input id="inpkasubag" name="dtrskepada[]" type="checkbox" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkasubag"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kasubag
                                        TU</label>
                                </div>
                                <input type="text" name="dtrskepada_values[1]" id="kasubag-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Kasubag TU" value="Kasubag TU">
                                <div class="flex items-center mb-4">
                                    <input id="inpwaksek" name="dtrskepada[]" type="checkbox" value="2"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpwaksek"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Waksek</label>
                                </div>
                                <input type="text" name="dtrskepada_values[2]" id="waksek-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Waksek" value="Waksek">
                                <div class="flex items-center mb-4">
                                    <input id="inpkaprodi" name="dtrskepada[]" type="checkbox" value="3"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkaprodi"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ka
                                        Prog.Keahl</label>
                                </div>
                                <input type="text" name="dtrskepada_values[3]" id="kaprodi-input"
                                    class="shadow-sm hidden mb-3 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Ka Prog.Keahl" value="Ka Prog.Keahl">
                                <div class="flex items-center mb-4">
                                    <input id="inpkoordinator" name="dtrskepada[]" type="checkbox" value="4"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkoordinator"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Koordinator</label>
                                </div>
                                <input type="text" name="dtrskepada_values[4]" id="koordinator-input"
                                    class="shadow-sm hidden bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Koordinator" value="Koordinator">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="category-create"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dengan Hormat
                                    Harap</label>

                                <div class="flex items-center mb-4">
                                    <input id="inpsaran" name="dng_hormat[]" type="checkbox" value="1"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpsaran"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tanggapan Dan
                                        Saran</label>
                                    <input type="hidden" name="dng_lainnya[1]" value="Tanggapan Dan Saran">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inplanjut" name="dng_hormat[]" type="checkbox" value="2"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inplanjut"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Proses Lebih
                                        Lanjut</label>
                                    <input type="hidden" name="dng_lainnya[2]" value="Proses Lebih Lanjut">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inpkonfirmasikan" name="dng_hormat[]" type="checkbox" value="3"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inpkonfirmasikan"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Koordinasi/Konfirmasikan</label>
                                    <input type="hidden" name="dng_lainnya[3]" value="Koordinasi/Konfirmasikan">
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="inplainnya" name="dng_hormat[]" type="checkbox" value="4"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inplainnya"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lainnya</label>
                                </div>
                                <input type="text" name="dng_lainnya[4]" id="lainnya-input"
                                    class="shadow-sm hidden bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Lainnya">
                            </div> --}}

                        </div>

                <div class="flex justify-end mt-6">
                    <button
                        class="px-6 py-2 leading-5 text-white font-bold transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </div>
        </form>

    </section>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var lainnyaCheckbox = document.getElementById('inplainnya');
        var lainnyaInput = document.getElementById('lainnya-input');

        var kasubagCheckbox = document.getElementById('inpkasubag');
        var kasubagInput = document.getElementById('kasubag-input');

        var waksekCheckbox = document.getElementById('inpwaksek');
        var waksekInput = document.getElementById('waksek-input');

        var kaprodiCheckbox = document.getElementById('inpkaprodi');
        var kaprodiInput = document.getElementById('kaprodi-input');

        var kooridnatorCheckbox = document.getElementById('inpkoordinator');
        var kooridnatorInput = document.getElementById('koordinator-input');


        lainnyaCheckbox.addEventListener('click', function() {
            if (lainnyaCheckbox.checked) {
                lainnyaInput.classList.remove('hidden');
            } else {
                lainnyaInput.classList.add('hidden');
                lainnyaInput.value = '';
            }
        });

        kasubagCheckbox.addEventListener('click', function() {
            console.log('Checkbox Kasubag diubah');
            if (kasubagCheckbox.checked) {
                kasubagInput.style.display = 'block';
            } else {
                kasubagInput.style.display = 'none';
                kasubagInput.value = '';
            }
        });
        waksekCheckbox.addEventListener('click', function() {
            if (waksekCheckbox.checked) {
                waksekInput.classList.remove('hidden');
            } else {
                waksekInput.classList.add('hidden');
                waksekInput.value = '';
            }
        });
        kaprodiCheckbox.addEventListener('click', function() {
            if (kaprodiCheckbox.checked) {
                kaprodiInput.classList.remove('hidden');
            } else {
                kaprodiInput.classList.add('hidden');
                kaprodiInput.value = '';
            }
        });
        kooridnatorCheckbox.addEventListener('click', function() {
            if (kooridnatorCheckbox.checked) {
                kooridnatorInput.classList.remove('hidden');
            } else {
                kooridnatorInput.classList.add('hidden');
                kooridnatorInput.value = '';
            }
        });

    });

    function updateValtanggapan(checkbox) {
        var valtanggapanInput = document.getElementById('valtanggapan');

        if (checkbox.checked) {
            valtanggapanInput.value = 'Tanggapan Dan Saran';
        } else {
            valtanggapanInput.value = '';
        }
    }

    function updateValProsesLebih(checkbox) {
        var valprosesInput = document.getElementById('valprosesLebih');

        if (checkbox.checked) {
            valprosesInput.value = 'Proses Lebih Lanjut';
        } else {
            valprosesInput.value = '';
        }
    }

    function updateValKoordinasi(checkbox) {
        var valkoordinasiInput = document.getElementById('valkoordinasi');

        if (checkbox.checked) {
            valkoordinasiInput.value = 'Koordinasi';
        } else {
            valkoordinasiInput.value = '';
        }
    }
</script>
