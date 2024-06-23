@extends('layout.main')
@section('container')
<div class="">
    <h1 class="h2">Edit {{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <!-- Tombol atau elemen lainnya di sini -->
</div>

<div class="col-lg-8 mx-auto">
    <form action="/dashboard/post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" value="">
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
      
        <div class="mb-3">
            {{-- <input type="hidden" name="oldImage" value="{{ $post->image }}"> --}}
            <label for="formFile" class="form-label">Post Image</label>
            
            <img src="" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
            
            <input class="form-control" @error('image') is-invalid @enderror type="file" name="image" id="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
                </div>
                
                @enderror
                <button type="submit" class="btn btn-primary mt-3">Create Post</button>
    </form>
        
</div>
    
      </div>
@endsection