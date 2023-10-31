<?php

namespace App\Http\Livewire\Forum;

use App\Models\Theme;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ForumComponent extends Component
{
    use WithPagination;

    private $themes;
    public $mode;
    public $filter;

    public function mount()
    {
        $this->themes();
    }

    public function myThemes()
    {
        $this->mode = 'myThemes';
        if (auth()->check()) {
            $this->themes = auth()->user()->theme()->paginate(5);
        }
        $this->resetPage();
    }

    public function themes()
    {
        $this->mode = 'themes';
        $this->themes = Theme::paginate(5);
        $this->resetPage();
    }

    public function delete(Theme $theme)
    {
        $theme->delete();
    }
    public function filter()
    {
        if ($this->mode == 'themes') {
            $this->themes = Theme::query()
                ->where('title','ilike' , '%' . $this->filter . '%')
                ->orderBy('created_at')
                ->paginate(5);
        } elseif ($this->mode == 'myThemes') {
            $this->themes = Theme::query()
                ->where('title','ilike' , '%' . $this->filter . '%')
                ->where('user_id', auth()->user()->id)
                ->orderBy('created_at')
                ->paginate(5);
        }
        $this->resetPage();
    }

    public function render()
    {
        $this->filter(); // Apply the filter

        return view('livewire.forum.forum-component', ['themes' => $this->themes]);
    }
}
