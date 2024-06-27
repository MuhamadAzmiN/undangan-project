<?php

namespace App\Livewire;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostLike extends Component
{
    public $body, $postId;

    public function mount($id)
    {
        $this->postId = $id;

    }
    public function render()
    {
        return view('livewire.post-like', [
            'posts' => Post::all(),
            'totalLike' => Post::with('user')->where('user_id', $this->postId)->count(),
            'like' => Like::latest()->get(),
            'user' => User::latest()->paginate(5),
        ]);
    }




    public function like($id)
    {
        $data = [
            "post_id" => $id,
            "user_id" => Auth::user()->id
        ];


        $like = Like::where($data);
        if($like->count() > 0)
        {
            $like->delete();
        }else {
            Like::create($data);
        }


        return NULL;

    }
}
