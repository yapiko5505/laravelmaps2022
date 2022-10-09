<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            地図の個別表示
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">

                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold">
                            {{ $map->name }}
                        </h1><hr class="w-full">
                        <p class="mt-4 text-gray-600 py-4">{{$map->address}}</p>
                        <p class="mt-4 text-gray-600 py-4">{{$map->category->name}}</p>
                        <iframe id='map'
                        src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q={{ $map->address}}'
                        width='100%'
                        height='320'
                        frameborder='0'>
                        </iframe>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>