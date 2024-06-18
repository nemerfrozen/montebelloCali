<header class="bg-white shadow text-white h-16">
    <div class="py-6 flex justify-between items-center bg--header px-4">
        <!-- Logo -->
        <div class="text-lg font-bold">
            <a href="/">Montebello Cali</a>
            {{-- <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
            </a> --}}
        </div>
        <!-- Navigation -->
        <nav class="space-x-2">
            <a href="{{ url('/') }}" class="text-gray-100 hover:text-blue-500">Inicio</a>
            <a href="{{ url('/clasificado/crear') }}" class="text-gray-100 hover:text-blue-500">Crear Clasificado</a>
            <a href="{{ url('/contacto') }}" class="text-gray-100 hover:text-blue-500">Contacto</a>
        </nav>
      
    </div>
</header>
