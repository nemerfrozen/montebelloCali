@extends('layouts.app')
@section('title', 'Contacto')
@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mt-6">Contacto</h1>
        <p class="text-center mt-2">¿Tienes alguna duda o comentario? ¡Escríbenos!</p>
        <div class="flex justify-center mt-6">
            <form action="{{ route('contacto') }}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Mensaje:</label>
                    <textarea name="message" id="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection