<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentationArticle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function documentationSyntax()
    {
        return $this->hasMany(DocumentationSyntax::class);
    }

    public function documentationType()
    {
        return $this->belongsTo(DocumentationType::class);
    }

    public function documentationComment()
    {
        return $this->hasMany(DocumentationComment::class);
    }

    public function documentationConstructor()
    {
        return $this->hasMany(DocumentationConstructor::class);
    }

    public function documentationMethod()
    {
        return $this->hasMany(DocumentationMethod::class);
    }

    public function example()
    {
        return $this->hasMany(DocumentationExample::class);
    }

    public function documentationParameter()
    {
        return $this->hasMany(DocumentationParameter::class);
    }

    public function documentationRelatedClass()
    {
        return $this->hasMany(DocumentationRelatedClass::class);
    }

    public function exampleFeaturedFunction()
    {
        return $this->hasMany(ExampleFeaturedFunction::class);
    }

}
