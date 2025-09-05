<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Letters;
use Livewire\Component;
use Livewire\WithPagination;

class LetterTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $updatesQueryString = [
        'search' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = request()->query('search', '');
    }

    public function render()
    {
        info($this->search);
        $letters = Letters::query()
            ->when(!empty($this->search), function ($query) {
                $searchTerm = '%' . $this->search . '%';
                $query->where(function($subQuery) use ($searchTerm) {
                    $subQuery->where('title', 'like', $searchTerm)
                             ->orWhere('number_of_letters', 'like', $searchTerm);
                });
            })
            ->latest()
            ->paginate(5);

        $categories = Categories::all();

        return view('livewire.letter-table', compact('letters', 'categories'));
    }
}