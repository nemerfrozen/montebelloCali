@extends('layouts.app')
@section('title', 'Crear Clasificado')
@section('content')
   <div class="mx-auto  py-10 px-10">
    <div class="container mx-auto p-4">
        <button onclick="back()">Atras</button>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="md:flex">
                <!-- Imagen del producto -->
                <div class="md:w-1/2 p-4">
                    <img src="{{$classified->image}}" alt="Producto" class="w-50 h-auto">
                </div>
                <!-- Información del producto -->
                <div class="md:w-1/2 p-4">
                    <h2 class="text-2xl font-bold mb-2">
                        {{ $classified->title }}
                    </h2>
                    <p class="text-gray-700 mb-4">{{$classified->short_description}}</p>
                    <p class="text-gray-700 mb-4">{!! html_entity_decode($classified->description) !!} </p>
                    <div class="mb-4">
                        <span class="text-xl font-bold text-green-600">{{$classified->price}}</span>
                    </div>
                    {{-- <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Características</h3>
                        <ul class="list-disc list-inside">
                            <li>Característica 1</li>
                            <li>Característica 2</li>
                            <li>Característica 3</li>
                        </ul>
                    </div> --}}
                    <div class="flex items-center mb-4">
                        <span class="text-yellow-500 font-bold text-sm">★★★★☆</span>
                        <span class="ml-2 text-sm text-gray-600">(Número de opiniones)</span>
                    </div>
                    <div class="flex">
                        <a href="https://wa.me/{{$classified->phone}}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2 hover:bg-blue-600">{{$classified->phone}}</a>
                        {{-- <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Agregar al carrito</button> --}}
                    </div>
                </div>
            </div>
            <div class="p-4">
                <h3 class="text-lg font-semibold mb-2">Ubicación</h3>
                <div id="map" style="height: 400px; width: 100%"></div>
                {{-- <div class="space-y-4">
                    <div class="bg-gray-100 p-4 rounded">
                        <p class="font-semibold">Usuario 1</p>
                        <p class="text-yellow-500">★★★★☆</p>
                        <p>Comentario del usuario sobre el producto.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded">
                        <p class="font-semibold">Usuario 2</p>
                        <p class="text-yellow-500">★★★★★</p>
                        <p>Comentario del usuario sobre el producto.</p>
                    </div>
                    <!-- Más opiniones -->
                </div> --}}
            </div>
        </div>
    </div>    
   </div>
   {{-- mapa --}}
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   <script>
    var splitted = '{{$classified->geolocation}}'.split(',');
    //console.log(splitted);
    var lat = parseFloat(splitted[0]);
    var lon = parseFloat(splitted[1]);
    
    function back() {
        window.history.back();
    }
    // Crear el mapa
    var map = L.map('map').setView([lat,lon], 16);
    // Añadir un 'tile layer' (capa de baldosas) de OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Añadir un marcador
        L.marker([lat,lon]).addTo(map)
            .bindPopup('{{ $classified->title }}')
            .openPopup();
    
   </script>
@endsection