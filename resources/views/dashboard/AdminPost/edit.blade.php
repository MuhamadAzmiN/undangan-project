@extends('dashboard.dataUser.main')


@section('datadiri')
    <link rel="stylesheet" href="/css/dataDiri.css">
    @section('button')
        <form action="/dashboard/dataUser" method="GET">
            <button type="submit" style="background-color: white; border-radius: 59px; height: 25px; width: 60px; border: 1px solid #196ecd;">Data</button>
        </form>
    @endsection
    <div class="user-container">
        <hr style="margin-bottom: 20px">
        @if (session()->has('success'))
            <div style="" id="imageErrorToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body d-flex justify-content-center">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if (session()->has('danger'))
            <div style="" id="imageErrorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body d-flex justify-content-center">
                        {{ session('danger') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if ($errors->has('image'))
            <div style="" id="imageErrorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body d-flex justify-content-center">
                        Silahkan Kirimkan Berupa Gambar
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
           Launch static backdrop modal
         </button> --}}

        <!-- Modal -->



        
                <div class="form-input">

                    <img style="max-width: 100%; max-height: 500px; width: auto; height: auto; object-fit: contain;" src="{{ asset('storage/' . $post->image) }}" alt="">
                    <form action="/dashboard/adminPost/{{ $post->id }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="input-all">
                            <div class="input-1">
                                <div class="mb-3">
                                    <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                    <label for="inputGroupFile04" class="form-label">Upload Image</label>
                                    <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value
                                    {{$post->image}}">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="body" class="form-label">Body</label>
                                    <input type="text" class="form-control @error('body') is-invalid @enderror"  id="body" name="body" value="{{ $post->body }}">
                                    @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button id="btn-submit" type="submit" class="btn btn-primary mt-3">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Menampilkan toast jika ada error pada input image
        document.addEventListener('DOMContentLoaded', function() {
            var imageErrorToast = document.getElementById('imageErrorToast');
            var toast = new bootstrap.Toast(imageErrorToast);

            @if ($errors->has('image'))
            toast.show();
            @endif

            @if (session()->has('danger'))
            toast.show();
            @endif

            @if (session()->has('success'))
            toast.show();
            @endif
        });
    </script>
@endsection