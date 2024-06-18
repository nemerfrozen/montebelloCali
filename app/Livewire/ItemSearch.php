<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Classifieds;

class ItemSearch extends Component
{
    public $search = '';
    //public $category = '';
    //public $location = '';
    


    public function render()
    {   
        if (strlen($this->search) > 0) {
            $classifieds = Classifieds::where('title', 'like', '%' . $this->search . '%')->get();
            return view('livewire.item-search')->with('classifieds', $classifieds);
        } else {
            $classifieds = Classifieds::orderBy('created_at', 'desc')->get();
            return view('livewire.item-search')->with('classifieds', $classifieds);
        }
       
    }

   
}
