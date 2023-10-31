<?php

namespace App\Http\Livewire\Forum\Theme;

use App\Models\Theme;
use App\Models\ThemeReply;
use App\Models\ThemeReplyInteraction;
use Livewire\Component;
use Livewire\WithPagination;

class ThemeComponent extends Component
{
    use WithPagination;

    public $theme;
    public $content;

    public function mount(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required',
        ]);
        ThemeReply::create([
            'theme_id' => $this->theme->id,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
        $this->theme = $this->theme->fresh();
        $this->reset('content');
    }

    public function verify(ThemeReply $reply)
    {
        if ($this->theme->themeReply()->where('is_solution', true)->get()->count() > 0) {
            $oldSolution = $this->theme->themeReply()->where('is_solution', true)->get()->first();
            $oldSolution->update(['is_solution' => false]);
        }
        $reply->update([
            'is_solution' => !$reply->is_solution,
        ]);
        $this->theme->update(['is_solved' => $this->theme->themeReply()->where('is_solution', true)->get()->count() > 0]);
    }

    public function like(ThemeReply $reply)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'theme_reply_id' => $reply->id,
            'interaction_type' => 'like',
        ];
        if ($reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->count() > 0) {
            $like = $reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->first();
            $like->delete();
        } else {
            if ($reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->count() > 0) {
                $dislike = $reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->first();
                $dislike->delete();
                ThemeReplyInteraction::create($data);
            } else {
                ThemeReplyInteraction::create($data);
            }
        }
    }

    public function delete(ThemeReply $reply)
    {
        $reply->delete();
    }

    public function dislike(ThemeReply $reply)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'theme_reply_id' => $reply->id,
            'interaction_type' => 'dislike'
        ];
        if ($reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->count() > 0) {
            $dislike = $reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'dislike')->get()->first();
            $dislike->delete();
        } else {
            if ($reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->count() > 0) {
                $like = $reply->themeReplyInteraction()->where('user_id', auth()->user()->id)->where('interaction_type', 'like')->get()->first();
                $like->delete();
                ThemeReplyInteraction::create($data);
            } else {
                ThemeReplyInteraction::create($data);
            }
        }
    }

    public function render()
    {
        return view('livewire.forum.theme.theme-component');
    }
}
