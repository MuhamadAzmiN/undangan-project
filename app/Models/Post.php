<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $guarded= ["id"];


    public function comment()
    {
        return $this->hasMany(comment::class);
    }

    

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
    return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function totalLike()
    {
       return $this->hasMany(Like::class)->count();
    }

    public function scopeFilter($query)
    {
        if (request()->has('cari')) {
            $keywords = explode(' ', request('cari'));
            foreach ($keywords as $keyword) {
                $query->where('body', 'like', '%' . $keyword . '%');
            }
        }
    }

}
