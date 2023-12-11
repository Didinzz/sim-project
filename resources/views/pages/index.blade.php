@extends('layouts.admin')
@section('title', 'Dashboard')
@section('dashboard', 'bg-gray-100 dark:bg-gray-700')

@section('content')
    <div class="text-white">
        <div class="box-border w-full p-4 ">

            <a href="#"
                class="block p-6 h-32 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="font-bold text-2xl text-black dark:text-white">Selamat datang {{ $user->name }}</h1>
            </a>
        </div>
        @if ($user->role == 1)
        <div class="box-border w-full p-4 ">

            <a href="#"
                class="block p-6 h-32 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="font-bold text-2xl text-black dark:text-white">Ini adalah data dari Admin</h1>
            </a>
        </div>
        @else
         <div class="box-border w-full p-4 ">

            <a href="#"
                class="block p-6 h-32 bg-white border border-gray-200 rounded-lg shadow-lg hover:bg-gray-200 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h1 class="font-bold text-2xl text-black dark:text-white">Ini adalah data dari Kepsek</h1>
            </a>
        </div>
        @endif
    </div>
@endsection
