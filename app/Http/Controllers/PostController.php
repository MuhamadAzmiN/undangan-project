<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::paginate(3);        // $jumlahUser = $user->count();
        // dd($jumlahUser);
        return view('dashboard.post.index',[
            "title" => "post",
            "post" => Post::latest()->get(),
            "like" => Like::all(),
            "user" => $user

        ]);
    }

    /**ost
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.post.create',[
            "title" => "Halaman Create",

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'body' => 'required|max:255',
            'image' => 'image|file'
        ]);

        if($request->file('image')){
            $validatedData["image"] = $request->file('image')->store('post-image');
        }

        $validatedData["user_id"] = auth()->user()->id;
        Post::create($validatedData);

        return redirect('/dashboard/post')->with('success', "Berhasil Terupdate");



    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
