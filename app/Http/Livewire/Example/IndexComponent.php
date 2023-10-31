<?php

namespace App\Http\Livewire\Example;

use App\Models\DocumentationSection;
use App\Models\ExampleSection;
use Livewire\Component;

class IndexComponent extends Component
{
    public $filter;
    public $sections;

    public function render()
    {
        $query = ExampleSection::whereHas('exampleType', function ($query) {
            $query->whereHas('exampleArticle', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        })->with(['exampleType', 'exampleType.exampleArticle']);

        $this->sections = $query->get();
        return view('livewire.example.index-component');
    }
}
