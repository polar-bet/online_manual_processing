<?php

namespace App\Http\Livewire\Admin\Example;

use App\Models\DocumentationType;
use App\Models\ExampleArticle;
use App\Models\ExampleType;
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
        $query = ExampleType::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('exampleSection', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        $this->types = $query->paginate(10);
        return view('livewire.admin.example.type-component', ['types' => $this->types]);
    }
}
