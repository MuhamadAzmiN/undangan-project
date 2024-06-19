<?php

namespace App\Livewire;
use App\Models\Like;
use App\Models\Post;
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
        return view('livewire.post-like',[
            'posts' => Post::with('user')->where('user_id', $this->postId)->get()
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
