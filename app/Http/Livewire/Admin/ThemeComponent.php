<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExampleType;
use App\Models\Theme;
use Livewire\Component;
use Livewire\WithPagination;

class ThemeComponent extends Component
{
    use WithPagination;

    private $themes;
    public $filter;

    public function filter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Theme::query();

        $query->where('title', 'ilike', '%' . $this->filter . '%')
            ->orWhere('id', 'ilike', '%' . $this->filter . '%')
            ->orWhereHas('user', function ($query) {
                $query->where('name', 'ilike', '%' . $this->filter . '%');
            });
        $this->themes = $query->paginate(10);
        return view('livewire.admin.theme-component', ['themes' => $this->themes]);
    }
}
