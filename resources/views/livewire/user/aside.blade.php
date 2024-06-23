<div>
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
        <div class="section-container">
            <div class="user-container">
                <h1>Top Like</h1>
                <hr class="text-muted" style="margin-top:10px;margin-bottom:10px">
                @foreach ($like as $item)
                <div class="text-image">
                    <img style="border-radius: 50%; max-width: 30px; max-height: 30px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive" 
                    src="{{ $item->user->image ? asset('storage/' . $item->user->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" 
                    alt="Profile Image">
                    <p style="color:black">{{ $item->name }}</p>
                </div>
                @endforeach
                
            </div>
        </div>
    </aside>
</div>