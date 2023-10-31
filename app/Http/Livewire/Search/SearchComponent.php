<?php

namespace App\Http\Livewire\Search;

use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
use App\Models\ExampleArticle;
use Livewire\Component;

class SearchComponent extends Component
{
    public $search;
    public $exampleResult = null;
    public $methodResult = null;
    public $documentationArticleResult = null;


    public function render()
    {
        if (!empty($this->search)) {
            $queryDocumentationArticle = DocumentationArticle::query();
            $queryDocumentationMethod = DocumentationMethod::query();
            $queryExampleArticle = ExampleArticle::query();
            $this->exampleResult = $queryExampleArticle->where('name', 'ilike', '%' . $this->search . '%')->limit(10)->get();
            $this->methodResult = $queryDocumentationMethod->where('name', 'ilike', '%' . $this->search . '%')->limit(10)->get();
            $this->documentationArticleResult = $queryDocumentationArticle->where('name', 'ilike', '%' . $this->search . '%')->limit(10)->get();
        }else{
            $this->exampleResult = null;
            $this->methodResult = null;
            $this->documentationArticleResult = null;
        }
        return view('livewire.search.search-component');
    }
}
