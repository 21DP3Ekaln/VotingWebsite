<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Dashboard') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="conteiner">

                <a href="{{ route('teachers.list') }}" class="button1"><i class='bx bx-show'></i>Vote teacher</a>
                <a href="{{ route('top-teachers') }}" class="button1"><i class='bx bxs-flag-checkered'></i>Top Teacher</a>


        </div>
        </div>
    </div>
</x-app-layout>
