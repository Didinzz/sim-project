@extends('layouts.admin')
@section('title', 'Dashboard')
@section('dashboard', 'bg-gray-100 dark:bg-gray-700')

@section('content')
    <div class="text-white">
        <div class="box-border w-full p-4">
            <h1 class="font-bold text-2xl text-black dark:text-white">Selamat datang {{ $user->name }}</h1>
        </div>
    </div>
    @if (session()->has('berhasil'))
        <div id="toast-success"
            class="flex items-center w-full max-w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-md  dark:text-gray-400 dark:bg-gray-800"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ Session('berhasil') }}.</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @if ($user->role == 1)
        <div
            class="block p-4 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 1 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600"><i class="far fa-envelope fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Masuk</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $masuk }} <span
                                        class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 2 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-pink-600"><i
                                        class="fas fa-envelope-open-text fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Keluar</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $keluar }} <span
                                        class="text-pink-500"><i class="fas fa-caret-down"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 mx-auto my-2">
                    <!-- Metric Card 3 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-600"><i
                                        class="fas fa-signature fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Yang Diajukan</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalAjuan }}<span
                                        class="text-yellow-600 ml-2"><i class="fas fa-clock fa-xs"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-4 my-1">
                    <!-- Metric Card 3 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-500 text-white">
                                    <i class="fas fa-file-alt fa-2x fa-fw"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Yang Belum Di
                                    Ajukan</h5>
                                <a href="{{ route('total-surat-belum') }}">
                                    <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $belumDiajukan }}
                                        <span class="text-blue-500 ml-2"><i class="fas fa-clock fa-xs"></i></span>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div
            class="block p-4 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 mx-auto">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 mx-auto my-4">
                    <!-- Metric Card 2 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-green-600"><i
                                        class="fas fa-envelope-open-text fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Keluar</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $keluar }}<span
                                        class="text-green-500"><i class="fas fa-caret-down"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 mx-auto my-4">
                    <!-- Metric Card 3 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-yellow-600"><i
                                        class="fas fa-pencil-alt fa-2x fa-fw fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Belum TTD</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $totalAjuan }} <span
                                        class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-3 mb-6 mx-auto my-4">
                    <!-- Metric Card 4 -->
                    <div
                        class="bg-white border border-gray-400 rounded shadow p-4 dark:bg-gray-800 dark:border-gray-700 mx-auto my-4">
                        <div class="flex items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded p-3 bg-blue-500"><i
                                        class="fas fa-signature fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-700 dark:text-gray-300">Total Surat Sudah TTD</h5>
                                <h3 class="font-bold text-3xl text-gray-800 dark:text-white">{{ $acc }} <span
                                        class="text-blue-500">
                                        {{-- <i class="fas fa-caret-up"></i></span> --}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
