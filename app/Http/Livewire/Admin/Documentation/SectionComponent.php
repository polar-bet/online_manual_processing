<?php

namespace App\Http\Livewire\Admin\Documentation;

use App\Models\DocumentationMethod;
use App\Models\DocumentationSection;
use Livewire\Component;
use Livewire\WithPagination;

class SectionComponent extends Component
{
    use WithPagination;

    private $section;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = DocumentationSection::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%');

        $this->section = $query->paginate(10);
        return view('livewire.admin.documentation.section-component', ['sections' => $this->section]);
    }
}
