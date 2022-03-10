<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UserIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->Orwhere('email', 'like', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.user-index', compact('users'));
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
