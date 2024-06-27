
@extends('layout.main')
@section('container')

<link rel="stylesheet" href="/css/postingan.css">

    <div class="postingan-container">
        <div class="container-one">
            <div class="padding-container">

                <h1>Post Something</h1>
                <hr class="text-muted" style="margin-bottom: 10px;margin-top:10px">
                <div class="create-postingan">
                    <img style="border-radius: 50%; max-width: 40px; max-height: 40px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive"
                    src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}"
                    alt="Profile Image">
                    <p>What's on your mind?</p>
                    <a style="margin-left: 230px" href="/dashboard/post/create"> Create Post?</a>
                </div>
            </div>
        </div>
        @livewire('post-like', ['id' => auth()->user()->id])
        @foreach ($post as $item)


        @livewire('post.comment',["id" => $item->id])
        @endforeach

{{-- @foreach ($comment as $item)
               <h1>{{ $item->body }}</h1>
           @endforeach --}}
</div>
<aside>
    <div class="section-container">
        <div class="user-container">
            <h1>Users</h1>
            <hr class="text-muted" style="margin-top:10px;margin-bottom:10px">
            @foreach ($user as $item)
            <div class="text-image">

                <img style="border-radius: 50%; max-width: 30px; max-height: 30px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive"
                src="{{ $item->image ? asset('storage/' . $item->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}"
                alt="Profile Image">
                <p style="color:black">{{ $item->name }}</p>

            </div>
            @endforeach
        </div>
    </div>
</aside>
<script>
     Livewire.on('comment_store', commentId => {
        var helloScroll = document.getElementByid('comment-'+ commentId);
        helloScroll.scrollIntoView({behavior:'smooth'}, true)
    })
 </script>

@endsection
