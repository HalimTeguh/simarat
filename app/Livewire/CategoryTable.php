<?php

namespace App\Livewire;

use App\Models\categories;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class CategoryTable extends Component
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
        $categories = Categories::query()
            ->when(!empty($this->search), function ($query) {
                $searchTerm = '%' . $this->search . '%';
                $query->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', $searchTerm);
                });
            })
            ->paginate(5);

        return view('livewire.category-table', compact('categories'));
    }
}
