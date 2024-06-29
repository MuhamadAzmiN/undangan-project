<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('dashboard.adminPost.index',[
            "title" => "Halamaan AdminPost",
            "postingan" => Post::latest()->get()
        ]);
    }


    public  function edit(Post $post, $id)
    {
        $post = Post::find($id);
//        dd($post->user->name);
//        dd($post);
        return view('dashboard.adminPost.edit',[
            "title" => "Halaman Edit Post",
            "post" => $post
        ]);
    }

    public  function update(Request $request, Post $post, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/dashboard/adminPost')->with('error', 'Post tidak ditemukan.');
        }

        $rules = [
            "body" => "required",
            "image" => "image|file"
        ]  ;

        $validateData = $request->validate($rules);
        if($request->oldImage)
        {
            Storage::delete($request->oldImage);
        }
        if ($request->file('image')) {
            $validateData["image"] = $request->file('image')->store('post-image');
        }
        $post->update($validateData);

        return redirect('/dashboard/adminPost')->with('success', "Post berhasil terupdate");
    }


    public  function destroy(Post $post, $id)
    {
//        $post = Post::find($post->id);
        $postId = Post::find($id);
        $postId->delete();


        return redirect('/dashboard/adminPost')->with('success', "Postingan Berhasil Dihapus");

    }
}
