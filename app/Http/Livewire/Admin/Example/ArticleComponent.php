<?php

namespace App\Http\Livewire\Admin\Example;

use App\Models\DocumentationArticle;
use App\Models\ExampleArticle;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComponent extends Component
{
    use WithPagination;

    private $articles;
    public $filter;

    public function mount()
    {
    }

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {

        $query = ExampleArticle::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('exampleType', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%')
                    ->orWhereHas('exampleSection', function ($query) {
                        $query->where('name', 'ilike', '%' . $this->filter . '%');
                    });
            });

        $this->articles = $query->paginate(10);
        return view('livewire.admin.example.article-component', ['articles' => $this->articles]);
    }
}
