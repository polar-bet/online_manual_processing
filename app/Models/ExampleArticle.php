<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExampleArticle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function exampleType()
    {
        return $this->belongsTo(ExampleType::class);
    }

    public function exampleFeaturedFunction()
    {
        return $this->hasMany(ExampleFeaturedFunction::class);
    }

    public function exampleRelated()
    {
        return $this->hasMany(ExampleRelated::class);
    }

    public function exampleComment()
    {
        return $this->hasMany(ExampleComment::class);
    }
}
