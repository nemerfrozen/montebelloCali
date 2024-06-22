@extends('layouts.app')
@section('content')


<div class="flex my-auto flex-row w-full flex-wrap  justify-around" style="height:30rem;">
  <!-- 2 filas de 3 columnas card icon y texto h2-->
  <div class="px-10 py-4 bg-white mt-5">
    <div class="font-bold text-xl mb-2">Articulo</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
    </p>
    <div class="flex justify-center items-center mt-4">
      <a href="/clasificado/crear" class="bg-blue-600 py-4 px-10 text-white">Siguiente</a>
    </div>
  </div>

  <div class="px-10 py-4  bg-white mt-5">
    <div class="font-bold text-xl mb-2">Negocio</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. D
    </p>
    <!-- footer -->
    <div class="flex justify-center items-center mt-4">
      <a href="/negocio/crear" class="bg-blue-600 py-4 px-10 text-white">Siguiente</a>
    </div>
  </div>

  <div class="px-10 py-4  bg-white mt-5">
    <div class="font-bold text-xl mb-2">Renta</div>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
    </p>
    <div class="flex justify-center items-center mt-4">
      <a href="/renta/crear" class="bg-blue-600 py-4 px-10 text-white">Siguiente</a>
    </div>
  </div>

  <div class="px-10 py-4  bg-white mt-5">
    <div class="font-bold text-xl mb-2">Empleo</div>
    <!-- icon -->
    <i class="fa-solid fa-user-tie"></i>
    <p class="text-gray-700 text-base">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. D
    </p>
    <div class="flex justify-center items-center mt-4">
      <a href="/empleo/crear" class="bg-blue-600 py-4 px-10 text-white">Siguiente</a>
    </div>
  </div>

</div>


@endsection