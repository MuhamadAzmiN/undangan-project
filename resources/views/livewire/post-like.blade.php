<div>


    <link rel="stylesheet" href="/css/seacrh-post.css">

    <div class="group" style="margin-top: -20px;margin-bottom: 20px">
        <form action="/dashboard/post">
            <button type="submit"><svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg></button>
            <input name="cari" placeholder="Search" type="text" class="input" style="width: 550px" value="{{ request('cari') }}">
        </form>
    </div>
  @foreach ($posts as $item)
        <div class="postingan">
            <div class="post">
                <h1></h1>
                <div class="post-postingan">
                    <img style="border-radius: 50%; max-width: 50px; max-height: 50px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive"
            src="{{ $item->user->image ? asset('storage/' . $item->user->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}"
            alt="Profile Image">
            <div class="text-profile">
                <p>{{ $item->user->name }}</p>
                <p style="font-size: 11px">{{ $item->created_at }}</p>
            </div>
        </div>
        <p style="margin-top: 15px">{{ $item->body }}</p>
        <div class="image-postingan">
            <img style="max-width: 580px; max-height: 580px; width: 580px; height: 580px; object-fit: cover;border-radius:10px" src="{{ asset('storage/' . $item->image) }}" alt="">
            <div style="display: flex;align-items:center;margin-top:10px" class="button">
                <button style="background-color: black;color:white;margin-right:10px" type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><i class="bi bi-chat-left-dots-fill"></i>
                </button>
                @if ($item->hasLike())
                    <button style="margin-right: 10px" wire:click="like({{ $item->id }})" class="btn btn-sm btn-danger"><i class="bi bi-heart-fill"></i>{{ $item->totalLike() }}</button>
                @else
                    <button wire:click="like({{ $item->id }})" class="btn btn-sm" style="background-color: black; color: white;"><i class="bi bi-heart-fill"></i>{{ $item->totalLike() }}</button>
                @endif
            </div>
           @livewire('post.comment',["id" => $item->id ])
        </div>
    </div>
</div>
@endforeach








</div>
