@extends('layout.main')

@section('container')



    <div class="col-lg-5 mx-auto">
        <h1 style="margin-top: 20px3">Create Post {{ auth()->user()->name }}</h1>
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
                <label for="image" class="form-label">Post Image</label>
                <img src="" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Hidden field for old image --}}
            {{-- <input type="hidden" name="oldImage" value="{{ $post->image }}"> --}}

            <button type="submit" class="btn btn-primary mt-3">Create Post</button>
        </form>
    </div>
    <script>


    function previewImage(){
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';
        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result
        }

    }

    </script>

@endsection
