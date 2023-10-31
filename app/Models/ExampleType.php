<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExampleType extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function exampleSection()
    {
        return $this->belongsTo(ExampleSection::class);
    }

    public function exampleArticle()
    {
        return $this->hasMany(ExampleArticle::class);
    }
}
