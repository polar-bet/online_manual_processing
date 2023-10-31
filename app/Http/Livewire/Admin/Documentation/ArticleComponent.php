<?php

namespace App\Http\Livewire\Admin\Documentation;

use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
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
        $query = DocumentationArticle::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('documentationType', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%')
                    ->orWhereHas('documentationSection', function ($query) {
                        $query->where('name', 'ilike', '%' . $this->filter . '%');
                    });
            });

        $this->articles = $query->paginate(10);
        return view('livewire.admin.documentation.article-component', ['articles' => $this->articles]);
    }
}
