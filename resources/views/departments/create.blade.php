<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Department') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('departments.store') }}" method="POST"> 
                        @csrf

                        <div>
                            <label for="name">Department Name:</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Add Department</button>
                        <a href="/home" class="back-btn"> Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>