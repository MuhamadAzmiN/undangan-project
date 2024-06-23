<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function hasLike()
    {
       return $this->belongsTo(Like::class)->where(Auth::user()->id);
    }

    public function totalLike()
    {
       return $this->belongsTo(Like::class)->count();
    }


}
