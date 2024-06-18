<x-layout>
   <div class="container mx-auto p-4">
      <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
         @foreach ($items as $item)
            
            <x-card :item="$item" />
         @endforeach
      </div>
   </div>
</x-layout>