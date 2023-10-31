<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentationMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function documentationArticle()
    {
        return $this->belongsTo(DocumentationArticle::class);
    }

    public function documentationMethodParameter()
    {
        return $this->hasMany(DocumentationMethodParameter::class);
    }

    public function documentationMethodRelated()
    {
        return $this->hasMany(DocumentationMethodRelated::class);
    }
}
