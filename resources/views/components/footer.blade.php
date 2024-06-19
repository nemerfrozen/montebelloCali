<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center">
            <!-- Logo y Copy -->
            <div class="text-center md:text-left">
                <a href="{{ url('/') }}" class="text-lg font-bold">
                    {{-- <img src="{{ asset('images/logo-white.png') }}" alt="Logo" class="h-8 inline-block"> --}}
                </a>
                <a href="http://guillermogdeveloper.com" class="mt-2">&copy; {{ date('Y') }}  Guillermo Guzman Vargas. Todos los derechos reservados.</a>
            </div>
            <!-- Navigation Links -->
            <nav class="space-x-4 hidden md:block">
                <a href="{{ url('/') }}" class="text-gray-400 hover:text-white">Inicio</a>
                <a href="{{ url('/about') }}" class="text-gray-400 hover:text-white">Acerca de</a>
                <a href="{{ url('/contact') }}" class="text-gray-400 hover:text-white">Contacto</a>
            </nav>
            
        </div>
    </div>
</footer>
