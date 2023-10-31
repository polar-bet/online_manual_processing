<?php

namespace App\Http\Livewire\Documentation;

use App\Models\DocumentationSection;
use Livewire\Component;

class IndexComponent extends Component
{
    public $filter;
    public $sections;

    public function render()
    {
        $query = DocumentationSection::whereHas('documentationType', function ($query) {
            $query->whereHas('documentationArticle', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        })->with(['documentationType', 'documentationType.documentationArticle']);

        $this->sections = $query->get();
        return view('livewire.documentation.index-component');
    }
}
