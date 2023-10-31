<?php

namespace App\Http\Livewire\Admin\Example;

use App\Models\ExampleSection;
use App\Models\ExampleType;
use Livewire\Component;
use Livewire\WithPagination;

class SectionComponent extends Component
{
    use WithPagination;

    private $sections;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = ExampleSection::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%');
        $this->sections = $query->paginate(10);
        return view('livewire.admin.example.section-component', ['sections' => $this->sections]);
    }
}
