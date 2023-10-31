<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentationType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function documentationSection()
    {
        return $this->belongsTo(DocumentationSection::class);
    }

    public function documentationArticle()
    {
        return $this->hasMany(DocumentationArticle::class);
    }

}
