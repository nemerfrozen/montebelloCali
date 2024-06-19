@extends('layouts.app')
@section('title', 'Crear Clasificado')
@section('content')
   <div class="mx-auto  py-10 px-10">


      <h1 class="font-bold text-xl text-center">Crear Anuncio</h1>

      <form id="create_class" action="/clasificado/crear" method="POST" enctype="multipart/form-data" class="space-y-6">
         @csrf
         <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
            <input required type="text" id="title" name="title" placeholder="Title"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
         </div>
         <div>
            <label for="short_description" class="block text-sm font-medium text-gray-700">Descripcion corta</label>
            <input required type="text" id="short_description" name="short_description" placeholder="Short Description"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
         </div>
         <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Descripcion</label>
            <textarea id="description" name="description" cols="10" rows="20" placeholder="Description"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" style="height: '300px';"></textarea>
         </div>
         <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" id="price" name="price" placeholder="$ 100"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
         </div>
         <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
            {{-- <input type="text" id="category" name="category" placeholder="Category"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> --}}
            <select required id="category" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="category">
              <option value="">Seleccione Categoria...</option> 
               @foreach ($categories as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Ubicacion</label>
            <select id="location" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="location">
              @foreach ($locations as $location)
               <option value="{{ $location->name }}">{{ $location->name }}</option>
               @endforeach
              
            </select>
         </div>
         <div>
            <label for="sector" class="block text-sm font-medium text-gray-700">Sector</label>
            <select id="sector" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="sector">
               <option value="">Todos los Sectores</option>
               @foreach ($sectors as $sector)
               <option value="{{ $sector->name }}">{{ $sector->name }}</option>
               @endforeach              
            </select>
         </div>
         <div>
            <label for="sector" class="block text-sm font-medium text-gray-700">GeoLocalizacion</label>
           <input type="text" id="geolocation" name="geolocation" placeholder="3.451647, -76.531985"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
         </div>
         <div id="map">
            <div id="map" style="height: 200px; width: 100%; background: #fff;"></div>
         </div>
         <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Telefono</label>
            <input type="number" id="phone" name="phone" placeholder="Phone"
               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
         </div>
         <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="image" name="image" accept="image/*" placeholder="Image"
               class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md cursor-pointer focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
         </div>
         <div>
            <div class="g-recaptcha" data-sitekey="6LfCGfwpAAAAAEcXthqdKzgwgid8suFYozl1pBok"></div>
         </div>
         <div>
            <button type="submit"
               class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enviar</button>
         </div>
         {{-- errors --}}
         @if ($errors->any())
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
            @endif
      </form>      
 {{-- mapa --}}
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
      <script>
         document.getElementById('geolocation').value = '3.4848955002482045, -76.55181668829546';
         setMap(3.4848955002482045, -76.55181668829546);

         // event listener geolocation
         document.getElementById('geolocation').addEventListener('change', function () {
             var location = document.getElementById('location').value;
               var splited = location.split(',');
               console.log("🚀 ~ splited:", splited)
               var lat = parseFloat(splited[0]);
               var long = parseFloat(splited[1]);
             setMap(lat, long);
         });
         
        
         // ready function
         document.addEventListener('DOMContentLoaded', function () {
             ClassicEditor
                 .create(document.querySelector('#description'))
                 .catch(error => {
                     console.error(error);
                 });
                 
         });
         function setMap (lat, long){
         console.log('setMap');
         // map
        
            var map = L.map('map').setView([lat,long], 16);
            // Añadir un 'tile layer' (capa de baldosas) de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
               }).addTo(map);

               var marker = L.marker([lat,long], { draggable: true }).addTo(map);

               marker.on('dragend', function (e) {
                  var latlng = marker.getLatLng();
                  console.log("Marcador arrastrado a: " + latlng.lat + ", " + latlng.lng);
                  document.getElementById('geolocation').value = latlng.lat + ', ' + latlng.lng;
               });
               
         }
        

            
            
         
    




         document.getElementById('create_class').addEventListener('submit', (e) => {
             e.preventDefault();
             console.log('submit');
             confirmar();
         });
         

         function confirmar() {           
             // validate form 
               var description = document.getElementById('description').value;
               console.log("🚀 ~ confirmar ~ description:", description)
               var location = document.getElementById('location').value;
               console.log("🚀 ~ confirmar ~ location:", location)


               if (description == '') {
                   Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'La descripcion no puede estar vacia!',
                   });
                   return false;
               }

               if (location == '') {
                   Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'La ubicacion no puede estar vacia!',
                   });
                   return false;
               }
               // load
               Swal.fire({
                   title: 'Guardando...',
                   onBeforeOpen: () => {
                       Swal.showLoading()
                   },
               });
               // validate recaptcha
               var response = grecaptcha.getResponse();
               if (response.length == 0) {
                   Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'Debes validar el captcha!',
                   });
                   return false;
               }

               document.getElementById('create_class').submit();

         }
      </script>
     
   </div>
@endsection