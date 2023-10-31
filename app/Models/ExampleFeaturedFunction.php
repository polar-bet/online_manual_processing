<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExampleFeaturedFunction extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function exampleArticle()
    {
        return $this->belongsTo(ExampleArticle::class);
    }

    public function documentationArticle()
    {
        return $this->belongsTo(DocumentationArticle::class);
    }
}
