<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function themeReply()
    {
        return $this->hasMany(ThemeReply::class);
    }

    public function themeView()
    {
        return $this->hasMany(ThemeView::class);
    }
}
