<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThemeReply extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function themeReplyInteraction()
    {
        return $this->hasMany(ThemeReplyInteraction::class);
    }
}
