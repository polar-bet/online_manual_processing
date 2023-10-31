<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExampleComment extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function exampleArticle()
    {
        return $this->belongsTo(ExampleArticle::class);
    }
    public function exampleCommentInteraction()
    {
        return $this->hasMany(ExampleCommentInteraction::class);
    }
}
