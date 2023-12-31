@extends('layouts.admin')
@section('title', 'Profile')
@section('profile', 'bg-gray-300 dark:bg-gray-700')

@section('content')
    <div class="w-full bg-white dark:bg-gray-900 rounded-lg shadow-lg p-6">
        <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-5">
                <label for="website-admin"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <div class="flex">
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                        </svg>
                    </span>
                    <input type="text" name="nama" id="website-admin"
                        class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Bonnie Green" required value="{{ Auth::user()->name }}">
                </div>
            </div>

            <div class="mb-5">
                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nip Kepala
                    Sekolah</label>
                <input type="text" id="nip" name="nip"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nip" value="{{ Auth::user()->nip }}" required>
            </div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Tanda
                Tangan</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_ttd" id="file_ttd" name="file_ttd" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_ttd">PNG.</p>

            <label class="block mb-2 text-lg mt-5 font-medium text-gray-900 dark:text-white"
                for="file_input">Preview</label>
            <img class="h-auto max-w-xl w-full rounded-lg shadow-xl bg-white dark:shadow-gray-800"
                src="{{ asset('storage/' . Auth::user()->ttd) }}" alt="gambar ttd">


            <button type="submit"
                class="text-white mt-3 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
        </form>
    </div>
@endsection
