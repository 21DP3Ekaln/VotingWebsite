<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between"> <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Dashboard') }}
            </h2>

            <div> <a href="{{ route('teachers.list') }}" class="btn btn-primary mr-2">View All Teachers</a>
            </div>
        </div> 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            </div>
        </div>
    </div>
</x-app-layout>