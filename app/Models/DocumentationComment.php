<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentationComment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentationArticle()
    {
        return $this->belongsTo(DocumentationArticle::class);
    }

    public function documentationCommentInteraction()
    {
        return $this->hasMany(DocumentationCommentInteraction::class);
    }

}
