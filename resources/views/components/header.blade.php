<header class="bg-white shadow text-white h-16">
    <div class="py-6 flex justify-between items-center bg--header px-4">
        <!-- Logo -->
        <div class="text-lg font-bold">
            <a href="/" class="text-xl italic">Montebello Cali</a>
            {{-- <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            </a> --}}
        </div>
        <!-- Navigation -->
        <nav class="">
            <a href="{{ url('/') }}" class="text-white py-2 rounded-md px-2 border-solid border-2 border-sky-500 hover:text-blue-500">Inicio</a>
            <a href="{{ url('/clasificado/crear') }}" class="text-black py-2 rounded-sm px-2 bg-yellow-200 hover:text-blue-500">Publicar anuncio</a>
            <a href="{{ url('/contacto') }}" class="text-white py-2 rounded-md px-2 border-solid border-2 border-sky-500 hover:text-blue-500">Contacto</a>
        </nav>
      
    </div>
</header>
