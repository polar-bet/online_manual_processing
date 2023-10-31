<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeReplyInteraction extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function themeReply()
    {
        return $this->belongsTo(ThemeReply::class);
    }
}
