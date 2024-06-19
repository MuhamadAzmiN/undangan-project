<div>
    <!-- Button untuk membuka modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal-{{ $postId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div style="flex-direction:column">
                <img style="width:1000px" 
                    class="" 
                    src="{{ $post->image ? asset('storage/' . $post->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" 
                    alt="Postingan">
            </div>
            <div class="modal-content" style="display: flex;">
                <div class="modal-body" style="flex: 1;">
                    <!-- Daftar komentar menggunakan foreach -->
                    @foreach ($komen as $item)
                        <div class="mb-3" id="comment-{{ $item->id }}">
                            <div class=" d-flex align-items-start">
                                <!-- Gambar di sebelah kiri -->
                                <img style="border-radius: 50%; max-width: 50px; max-height: 50px; width: 80px; height: 80px; object-fit: cover; margin-right: 10px;" 
                                    class="img-responsive" 
                                    src="{{ $item->user->image ? asset('storage/' . $item->user->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" 
                                    alt="Profile Image">
    
                                <!-- Konten komentar -->
                                <div>
                                    <h5 class="card-title">{{ $item->user->name }}</h5>
                                    <p class="card-text">{{ $item->body }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Form Livewire untuk menambahkan komentar -->
                    <form wire:submit.prevent="store">
                        <div class="mb-3" style="width: 750px;">
                            <label for="body" class="form-label"></label>
                            <div class="input-group">
                                <input type="text" wire:model.defer="body" class="form-control" id="body" placeholder="Tulis komentar...">
                                <button style="background-color: rgb(80, 80, 248);color:white" type="submit" class="btn btn-primary">Tambah Komentar</button>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
</div>