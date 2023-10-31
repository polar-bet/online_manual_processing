<?php

namespace App\Http\Livewire\Admin\Documentation;

use App\Models\DocumentationArticle;
use App\Models\DocumentationMethod;
use App\Models\DocumentationType;
use Livewire\Component;
use Livewire\WithPagination;

class MethodComponent extends Component
{
    use WithPagination;
    private $methods;
    public $filter;

    public function filter(){
        $this->resetPage();
    }
    public function render()
    {
        $query = DocumentationMethod::query();

        $query->where('name', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%');

        $this->methods = $query->paginate(10);
        return view('livewire.admin.documentation.method-component', ['methods' => $this->methods]);
    }
}
