<?php

namespace App\Http\Livewire\Example;

use App\Models\DocumentationSection;
use App\Models\ExampleSection;
use Livewire\Component;

class SidebarComponent extends Component
{
    public $sections;
    public $filter;
    public $status = 'example';
    public $activeSections = [];
    public $activeTypes = [];
    public $isSidebarActive = false;

    public function mount()
    {
        foreach (ExampleSection::all() as $section) {
            $this->activeSections[$section->id] = true;
            foreach ($section->exampleType as $type) {
                $this->activeTypes[$type->id] = true;
            }
        }
    }

    public function sidebarToggle()
    {
        $this->isSidebarActive = !$this->isSidebarActive;
    }

    public function sectionToggle($sectionId)
    {
        $this->activeSections[$sectionId] = !$this->activeSections[$sectionId];
    }

    public function typeToggle($typeId)
    {
        $this->activeTypes[$typeId] = !$this->activeTypes[$typeId];
    }

    public function render()
    {
        $query = ExampleSection::whereHas('exampleType', function ($query) {
            $query->whereHas('exampleArticle', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        })->with(['exampleType', 'exampleType.exampleArticle']);

        $this->sections = $query->get();

        return view('livewire.includes.sidebar-component');
    }
}
