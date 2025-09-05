<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
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

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->search = request()->query('search', '');
    }

    public function getUsersProperty()
    {
        return User::query()
            ->when(strlen(trim($this->search)) > 0, function ($query) {
                $searchTerm = trim($this->search);
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('role', 'LIKE', "%{$searchTerm}%");
                });
            })
            ->orderBy('id', 'asc') // This is crucial for consistent pagination
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => $this->users
        ]);
    }
}