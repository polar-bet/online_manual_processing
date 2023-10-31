<?php

namespace App\Http\Livewire\Admin\Documentation;

use App\Models\DocumentationType;
use Livewire\Component;
use Livewire\WithPagination;

class TypeComponent extends Component
{
    use WithPagination;

    private $types;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DocumentationType::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('documentationSection', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        $this->types = $query->paginate(10);
        return view('livewire.admin.documentation.type-component', ['types' => $this->types]);
    }
}
