<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список отзывов') }}
        </h2>
    </x-slot>
    <script src="{{ asset('public/build/assets/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('public/build/assets/bootstrap.min.css') }}" >
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($dates as $date)                    
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="text-xl font-semibold">
                            # {{ $date->id }} / {{ $date->name }}
                        </div>
                        <div style="margin-top: 15px">
                            <p class="indent-8">{{ $date->feedback }}</p>
                        </div>
                        <div class="pt-20 flex justify-between" style="margin-top: 15px">
                            <div>Rating: {{ $date->raiting }}</div>
                            <div>Date: {{ $date->created_at }}</div>
                        </div>                    
                    </div>
                @endforeach
            </div>
            
        </div>
        
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ $dates->links() }}
    </div>
</x-app-layout>
