<?php

namespace App\Livewire;

use Livewire\Component;

class Catalog extends Component
{
        public function render()
    {
        $products = Product::all();
        return view('livewire.catalog', ['products' => $products]);
    }
}

