@extends('layouts.admin')
@section('title', 'Form Surat Dispen Guru')
@section('content')
    <!-- component -->
    <section
        class="max-w-4xl p-6 mx-auto bg-white border border-gray-300 rounded-md shadow-xl dark:bg-gray-800 mt-20 dark:border-none dark:shadow-xl">
        <h1 class="text-2xl flex justify-center font-bold text-black capitalize dark:text-white">Berkas Surat Keluar</h1>
        <form action="{{ route('store-pegawai-surat-dispen-guru') }}" method="POST" enctype="multipart/form-data">
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
                        value="Surat Dispen Guru">
                </div>

            </div>


            {{-- Surat Dispen Guru --}}



            <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
            <h4 class="text-2xl font-bold dark:text-white">Surat Dispensasi Guru</h4>
            <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <label for="nomor_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="005/DIKBUD/SMK1/TU/XI/" value="005/DIKBUD/SMK1/TU/XI/" required>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="nomor_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Surat </label>
                    <input type="date" name="tanggalSurat" id="nomor_surat" min="{{ now()->format('Y-m-d') }}"
                        value="{{ now()->format('Y-m-d') }}"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="005/DIKBUD/SMK1/TU/XI/" value="005/DIKBUD/SMK1/TU/XI/" required>
                </div>

                <div class="col-span-6 sm:col-span-8">
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex justify-between">
                        <h4 class="text-2xl font-bold dark:text-white">Data Guru</h4>
                        <button id="tambahSiswaBtn" onclick="tambahInput()"
                            class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="button">Tambah Data Guru</button>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div id="Container">
                        <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                            <div class="w-full">
                                <label for="nama_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Guru 1</label>
                                <input type="text" name="nama_guru[]"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Nama Guru" required>
                            </div>
                            <div class="w-full">
                                <label for="kelas_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sekolah</label>
                                <input type="text" name="sekolah[]"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 w-full border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Asal Sekolah Guru" required>
                            </div>
                            <div class="w-full">
                                <label for="keterangan_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Utusan</label>
                                <input type="text" name="utusan[]"
                                    class="shadow-sm flex-shrink-0 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Asal Sekolah" required>
                            </div>
                        </div>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                </div>
                <div class="col-span-6 sm:col-span-8">
                    <hr class="h-px my-3 bg-gray-200 border-0 dark:bg-gray-700">
                    <div class="flex justify-between">
                        <h4 class="text-2xl font-bold dark:text-white">Perihal Dispensasi</h4>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
                    <div id="Container">
                        <div class="sm:flex justify-stretch gap-4" id="inputGroup1">
                            <div class="w-full">
                                <label for="nama_siswa_1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                                <textarea type="text" name="perihalKegiatan"
                                    class="shadow-sm flex-shrink-0 h-40 bg-gray-50 border w-full border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>Untuk mengikuti kegiatan Bimtek Program Pengembangan Keprofesion Berkelanjutan (PPKB) Tingkat Menengah Bagi Guru Pendidikan Agama Islam (GPAI) Tahun 2021, dilingkungan Kanwil Kementrian Agama Provinsi Gorontalo, yang akan dilaksanakan pada Tanggal 04 s/d 06 Oktober 2021 bertempat di Grand Q Hortel Kota Gorontalo.</textarea>
                            </div>

                        </div>
                    </div>
                    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
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

    <script>
        var counter = 1;

        function tambahInput() {
            counter++;

            // Duplikat input group pertama
            var clone = document.getElementById('inputGroup1').cloneNode(true);
            clone.id = 'inputGroup' + counter;

            // Ubah nomor urutan di dalam elemen label
            var labels = clone.querySelectorAll('label');
            labels.forEach(function(label) {
                label.textContent = label.textContent.replace(/\d+/, counter);
            });

            // Ubah nama atribut input agar tidak konflik dengan yang lain
            var inputs = clone.querySelectorAll('input');
            inputs.forEach(function(input) {
                var currentName = input.getAttribute('name');
                input.setAttribute('name', currentName.replace(/\[\d+\]/, '[' + counter + ']'));
                input.value = ''; // Kosongkan nilai input
            });

            // Tambahkan input group baru ke dalam container
            document.getElementById('Container').appendChild(clone);
        }
    </script>
@endsection
