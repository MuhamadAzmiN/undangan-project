<div>




   



  @foreach ($posts as $item)
        <div class="postingan">
            <div class="post">
                <div class="post-postingan">
                    <img style="border-radius: 50%; max-width: 50px; max-height: 50px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive" 
            src="{{ $item->user->image ? asset('storage/' . $item->user->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" 
            alt="Profile Image">
            <div class="text-profile">
                <p>{{ $item->user->name }}</p>
                <p style="font-size: 11px">{{ auth()->user()->created_at }}</p>
            </div>
        </div>
        <p style="margin-top: 15px">{{ $item->body }}</p>
        <div class="image-postingan">
            <img style="max-width: 580px; max-height: 580px; width: 580px; height: 580px; object-fit: cover;border-radius:10px" src="{{ asset('storage/' . $item->image) }}" alt="">
            <div style="display: flex;align-items:center;margin-top:10px" class="button">
                <button style="background-color: black;color:white;margin-right:10px" type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item->id }}"><i class="bi bi-chat-left-dots-fill"></i>
                </button>  
                @if ($item->hasLike())
                    <button wire:click="like({{ $item->id }})" class="btn btn-sm btn-danger"><i class="bi bi-heart-fill"></i>{{ $item->totalLike() }}</button>
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
