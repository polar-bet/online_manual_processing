<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExampleType;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleComponent extends Component
{
    use WithPagination;

    private $roles;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Role::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhere('status','ilike', '%' . $this->filter . '%');
        $this->roles = $query->paginate(10);
        return view('livewire.admin.role-component', ['roles' => $this->roles]);
    }
}
