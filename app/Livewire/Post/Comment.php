<?php

namespace App\Livewire\Post;


use App\Models\Comment as ModelsComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use App\Models\Like;

use PhpParser\Node\Stmt\Return_;

class Comment extends Component
{
    public $body, $postId;

    public function mount($id)
    {
        $this->postId = $id;

    }


    public function render()
    {

        $post = Post::find($this->postId);

        return view('livewire.post.comment',[
            'komen' => ModelsComment::with('user')->where('post_id', $this->postId)->get(),
            'post' => $post
        ]);
    }



    public function store()
    {
        $this->validate([
            'body' => 'required'
        ]);

        $comment = ModelsComment::create([
            "user_id" => Auth::user()->id,
            'post_id' => $this->postId,
            'body' => $this->body
        ]);

        // Redirect to dashboard post detail page

//        return NULL;

        return $this->redirect('/dashboard/post');


    }


    // public function like($id)
    // {
    //     dd($id);
    //     $data = [
    //         "post_id" => $id,
    //         "user_id" => Auth::user()->id
    //     ];


    //     $like = Like::where($data);
    //     if($like->count() > 0)
    //     {
    //         $like->delete();
    //     }else {
    //         Like::create($data);
    //     }


    //     return NULL;

    // }
}
