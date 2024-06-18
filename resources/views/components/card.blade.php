<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
  <img class="w-full h-48 object-cover" src="{{$item['image']}}" alt="Imagen del artículo">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">{{ $item['title'] }}</div>
    <p class="text-gray-700 text-base">
      {{ $item['short_description'] }}
    </p>
    <div class="mt-4">
      <span class="text-gray-900 font-bold text-lg"> ${{ $item['price'] }}</span>
      <p>
        {{$item['phone']}}
      </p>
    </div>
  </div>
  <!-- phone -->


  <div class="px-6 pt-4 pb-6">
    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      ver más
    </button>
  </div>
</div>