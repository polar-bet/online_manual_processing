<?php

namespace App\Http\Livewire\Example;

use App\Models\ExampleArticle;
use App\Models\ExampleComment;
use App\Models\ExampleCommentInteraction;
use Livewire\Component;
use Livewire\WithPagination;

class CommentComponent extends Component
{
    use WithPagination;

    private $comments;
    public $content;
    public $article;

    public function mount(ExampleArticle $article)
    {
        $this->article = $article;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required',
        ]);
        ExampleComment::create([
            'example_article_id' => $this->article->id,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
        $this->article = $this->article->fresh();
    }

    public function delete(ExampleComment $comment)
    {
        $comment->delete();
        $this->article = $this->article->fresh();
    }

    public function like(ExampleComment $comment)
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => auth()->user()->id,
            'example_comment_id' => $comment->id,
            'interaction_type' => 'like',
        ];
        if ($comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->count() > 0) {
            $like = $comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->first();
            $like->delete();
        } else {
            if ($comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->count() > 0) {
                $dislike = $comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->first();
                $dislike->delete();
                ExampleCommentInteraction::create($data);
            } else {
                ExampleCommentInteraction::create($data);
            }
        }
    }

    public function dislike(ExampleComment $comment)
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => auth()->user()->id,
            'example_comment_id' => $comment->id,
            'interaction_type' => 'dislike'
        ];
        if ($comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->count() > 0) {
            $dislike = $comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->first();
            $dislike->delete();
        } else {
            if ($comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->count() > 0) {
                $like = $comment->exampleCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->first();
                $like->delete();
                ExampleCommentInteraction::create($data);
            } else {
                ExampleCommentInteraction::create($data);
            }
        }
    }
    public function render()
    {
        $this->comments = $this->article->exampleComment()->orderByDesc('created_at')->paginate(5);
        return view('livewire.includes.comment-component', ['comments' => $this->comments]);
    }
}
