<?php

namespace App\Http\Livewire\Documentation;

use App\Models\DocumentationSection;
use Livewire\Component;

class SidebarComponent extends Component
{
    public $sections;
    public $filter;
    public $status = 'documentation';
    public $activeSections = [];
    public $activeTypes = [];
    public $isSidebarActive = false;

    public function mount()
    {
        foreach (DocumentationSection::all() as $section) {
            $this->activeSections[$section->id] = true;
            foreach ($section->documentationType as $type) {
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
        $query = DocumentationSection::whereHas('documentationType', function ($query) {
            $query->whereHas('documentationArticle', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        })->with(['documentationType', 'documentationType.documentationArticle']);

        $this->sections = $query->get();

        return view('livewire.includes.sidebar-component');
    }
}
