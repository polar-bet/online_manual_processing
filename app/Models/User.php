<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $guarded = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'muted_until'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function theme()
    {
        return $this->hasMany(Theme::class);
    }

    public function themeReply()
    {
        return $this->hasMany(ThemeReply::class);
    }

    public function themeReplyInteraction()
    {
        return $this->hasMany(ThemeReplyInteraction::class);
    }

    public function documentationCommentInteraction()
    {
        return $this->hasMany(DocumentationCommentInteraction::class);
    }

    public function exampleCommentInteraction()
    {
        return $this->hasMany(ExampleCommentInteraction::class);
    }
    public function exampleComment()
    {
        return $this->hasMany(ExampleComment::class);
    }

    public function documentationComment()
    {
        return $this->hasMany(DocumentationComment::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
