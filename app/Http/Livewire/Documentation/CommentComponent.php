<?php

namespace App\Http\Livewire\Documentation;

use App\Models\DocumentationArticle;
use App\Models\DocumentationComment;
use App\Models\DocumentationCommentInteraction;
use Livewire\Component;
use Livewire\WithPagination;

class CommentComponent extends Component
{
    use WithPagination;

    private $comments;
    public $content;
    public $article;

    public function mount(DocumentationArticle $article)
    {
        $this->article = $article;
    }

    public function addComment()
    {
        $this->validate([
            'content' => 'required',
        ]);
        DocumentationComment::create([
            'documentation_article_id' => $this->article->id,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
        $this->article = $this->article->fresh();
    }

    public function delete(DocumentationComment $comment)
    {
        $comment->delete();
        $this->article = $this->article->fresh();
    }

    public function like(DocumentationComment $comment)
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => auth()->user()->id,
            'documentation_comment_id' => $comment->id,
            'interaction_type' => 'like',
        ];
        if ($comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->count() > 0) {
            $like = $comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->first();
            $like->delete();
        } else {
            if ($comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->count() > 0) {
                $dislike = $comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->first();
                $dislike->delete();
                DocumentationCommentInteraction::create($data);
            } else {
                DocumentationCommentInteraction::create($data);
            }
        }
    }

    public function dislike(DocumentationComment $comment)
    {
        $userId = auth()->user()->id;
        $data = [
            'user_id' => auth()->user()->id,
            'documentation_comment_id' => $comment->id,
            'interaction_type' => 'dislike'
        ];
        if ($comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->count() > 0) {
            $dislike = $comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'dislike')->get()->first();
            $dislike->delete();
        } else {
            if ($comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->count() > 0) {
                $like = $comment->documentationCommentInteraction()->where('user_id', $userId)->where('interaction_type', 'like')->get()->first();
                $like->delete();
                DocumentationCommentInteraction::create($data);
            } else {
                DocumentationCommentInteraction::create($data);
            }
        }
    }
    public function render()
    {
        $this->comments = $this->article->documentationComment()->orderByDesc('created_at')->paginate(5);
        return view('livewire.includes.comment-component', ['comments' => $this->comments]);
    }
}
