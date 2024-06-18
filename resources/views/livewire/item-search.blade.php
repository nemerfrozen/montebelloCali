

<div class="container mx-auto p-4">    
    <h2 class="text-2xl font-bold">Buscar</h2>
    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">  
        
    <div class="mb-4">
        <input 
            type="text" 
            wire:model="search" 
            class="w-full p-2 border border-gray-300 rounded" 
            placeholder="Buscar por nombre...">
    </div>
    {{-- <div class="mb-4">
        <input 
            type="text" 
            wire:model="location" 
            class="w-full p-2 border border-gray-300 rounded" 
            placeholder="Buscar por ubicación...">
    </div>
    <div class="mb-4">
        <input 
            type="text" 
            wire:model="category" 
            class="w-full p-2 border border-gray-300 rounded" 
            placeholder="Buscar por categoría...">
    </div> --}}
    {{ $search }}
   

    
       

    <br>
    </div>

    <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($classifieds as $item)             
            <x-card :item="$item" />        
        @endforeach
    </div>
   
</div>


