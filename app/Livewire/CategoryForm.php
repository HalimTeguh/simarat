<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class CategoryForm extends Component
{
    public $name = '';
    public $slug = '';

    public function updatedName($value)
    {
        $this->slug = Str::slug($value, '-');
    }

    public function render()
    {
        return view('livewire.category-form');
    }
}
