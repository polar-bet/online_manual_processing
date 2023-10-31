<?php

namespace App\Http\Livewire\Admin;

use App\Models\Theme;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    private $users;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhere('email', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('role', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        $this->users = $query->paginate(10);

        return view('livewire.admin.user-component', ['users' => $this->users]);
    }
}
