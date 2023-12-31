<aside id="navbar-dropdown"
    class="fixed top-0 left-0 z-20 flex flex-col flex-shrink-0  w-64 h-full pt-16 font-normal duration-75 lg:flex transition-width hidden"
    aria-label="Sidebar">
    <div
        class="relative flex flex-col flex-1 min-h-0 pt-0 bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 space-y-1 bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <ul class="pb-2 space-y-2">
                    <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="email" id="mobile-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-200 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Search">
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center p-2 text-base text-gray-900 rounded-lg hover:bg-gray-200 group dark:text-gray-200 dark:hover:bg-gray-700 @yield('dashboard')">
                            <i class="fa-brands fa-hashnode"></i>
                            <span class="ml-3" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>
                    @if (Auth::user()->role == 2)
                        {{-- kepsek sidebar --}}
                        <li>
                            <a href="{{ route('profile') }}"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 @yield('profile')"
                                aria-controls="surat-masuk" data-collapse-toggle="surat-masuk">
                                <i class="far fa-user-circle"></i> <!-- Ganti dengan ikon profil -->
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Profil Saya</span>
                            </a>
                            <ul id="surat-masuk" class="hidden pl-4 space-y-2">
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('pengajuan') }}"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 @yield('belumAcc')"
                                aria-controls="surat-masuk" data-collapse-toggle="surat-masuk">
                                <i class="far fa-envelope"></i> <!-- Ganti dengan ikon surat -->
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Surat Belum Di Acc</span>
                                <span
                                    class="bg-gray-800 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-white dark:text-gray-700">
                                    {{ $totalAjuan }}</span>
                            </a>
                            <ul id="surat-masuk" class="hidden pl-4 space-y-2">
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('surat.acc') }}"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratAcc')"
                                aria-controls="surat-masuk" data-collapse-toggle="surat-masuk">
                                <i class="fas fa-signature"></i> <!-- Ganti dengan ikon surat telah di acc -->
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Surat Sudah Di Acc</span>
                                <span
                                    class="bg-gray-800 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-white dark:text-gray-700">
                                    {{ $acc }}</span>

                            </a>
                            <ul id="surat-masuk" class="hidden pl-4 space-y-2">
                            </ul>
                        </li>

                        {{-- surat masuk --}}
                    @elseif (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('dashboard.table') }}"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratmasuk')"
                                aria-controls="surat-masuk" data-collapse-toggle="surat-masuk">
                                <i class="fa-solid fa-envelope"></i>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Surat Masuk</span>
                            </a>
                            <ul id="surat-masuk" class="hidden pl-4 space-y-2">
                            </ul>
                        </li>
                        {{-- end surat masuk --}}



                        {{-- Surat keluar --}}
                        <li>
                            <button type="button"
                                class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratkeluar')"
                                aria-controls="surat-keluar" data-collapse-toggle="surat-keluar">
                                <i class="fa-solid fa-envelope-open-text"></i>
                                <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Surat
                                    Keluar</span>
                                <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <ul id="surat-keluar" class="hidden pl-4 space-y-2">
                                <li class="mt-2">
                                    <button type="button"
                                        class="@yield('kesiswaankeluar') flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700"
                                        aria-controls="kesiswaan" data-collapse-toggle="kesiswaan">
                                        <i class="fas fa-user-graduate"></i>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                            sidebar-toggle-item>Kesiswaan</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <ul id="kesiswaan" class="hidden pl-4 space-y-2">
                                        <li class="mt-2">
                                            <a href="{{ route('siswa-surat-dispen') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratDispen')">
                                                Surat Dispensasi
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('siswa-surat-keterangan') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratKeterangan')">
                                                Surat Keterangan
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('siswa-surat-pindah') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratPindah')">
                                                Surat Keterangan Pindah
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('siswa-surat-rekomendasi-beasiswa') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('rekomBeasiswa')">
                                                Surat Rekomendasi Beasiswa
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('siswa-surat-rekomendasi-ptn') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('rekomPtn')">
                                                Surat Rekomendasi PTN
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <button type="button"
                                        class="@yield('pegawaikeluar') flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700"
                                        aria-controls="kepegawaian" data-collapse-toggle="kepegawaian">
                                        <i class="fa-solid fa-user-tie"></i>
                                        <span class="flex-1 ml-3 text-left whitespace-nowrap"
                                            sidebar-toggle-item>Kepegawaian</span>
                                        <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <ul id="kepegawaian" class="hidden pl-4 space-y-2">
                                        <!-- Tambahkan item-menu kepegawaian di sini -->
                                        <li class="mt-2">
                                            <a href="{{ route('pegawai-surat-cuti') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratCuti')">
                                                Surat Cuti
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('pegawai-surat-tugas') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('suratTugas')">
                                                Surat Tugas
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('pegawai-surat-pensiun') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('pensiun')">
                                                Surat Pensiun Dini
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('pegawai-surat-home-visit') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('homevisit')">
                                                Surat Home Visit
                                            </a>
                                        </li>
                                        <li class="mt-2">
                                            <a href="{{ route('pegawai-surat-dispen-guru') }}"
                                                class="flex items-center p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-300 dark:text-gray-200 dark:hover:bg-gray-700 @yield('dispenGuru')">
                                                Surat Dispensasi Guru
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        {{-- end surat keluar --}}
                    @endif

                </ul>

            </div>
        </div>
        {{-- <div class="absolute bottom-0 left-0 justify-center hidden w-full p-4 space-x-4 bg-white lg:flex dark:bg-gray-800"
            sidebar-bottom-menu>
            <a href="" data-tooltip-target="tooltip-settings"
                class="inline-flex justify-center  p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <div id="tooltip-settings" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Settings page
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

        </div> --}}
</aside>
<div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>
