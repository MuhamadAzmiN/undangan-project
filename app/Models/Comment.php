<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function hasLike()
    {
       return $this->belongsTo(Like::class)->where('Likes.user_id', Auth::user()->id);
    }

    public function totalLike()
    {
       return $this->hasMany(Like::class)->count();
    }
    
}

