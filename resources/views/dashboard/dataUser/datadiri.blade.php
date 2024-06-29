@extends('dashboard.dataUser.main')


@section('datadiri')
<link rel="stylesheet" href="/css/dataDiri.css">
@section('button')
<form action="/dashboard/dataDiri" method="GET">

    <button type="submit" style="background-color: white; border-radius: 59px; height: 25px; width: 60px; border: 1px solid #196ecd;">Edit</button>
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
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Understood</button>
            </div>
          </div>
        </div>
      </div>


    <div class="data-diri" style="margin-top: 30px">
    <div class="profile-container">
        <h1 class="text-muted" style="font-weight: bold">Data Diri</h1>
    <div class="profile">
    <div class="all-profile">
        <div class="profile-image">

            @if (auth()->user()->image)
            <img style="border-radius: 50%; max-width: 100px; max-height: 100px; width: 100px; height: 100px; object-fit: cover;margin-right:10px" class="img-responsive" src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile Image">
            @else
            <img style="border-radius: 50%; max-width: 300px; max-height: 300px; width: 150px; height: 140px;" class="" src="https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain" alt="">

            @endif
        </div>
        <button type="button" class="btn-image btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ubah Foto Formal
        </button>



    </div>

    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
                <div class="modal-body">
                    <form action="{{ route('datadiri.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="hidden" name="oldImage" value="{{ auth()->user()->image }}">
                            <label for="inputGroupFile04" class="form-label">Upload Image</label>
                            <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

          <div class="form-input">
            <form action="{{ route('datadiri.edit') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-all" style="">
                    <div class="input-1">
                        <div class="mb-3">
                            <label for="romble" class="form-label">Username</label>
                            <h1>{{ auth()->user()->name }}</h1>

                            {{-- @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror --}}

                          </div>
                          <div class="mb-3">
                            <label for="romble" class="form-label">nis</label>
                            <h1>{{ auth()->user()->nis }}</h1>


                          </div>
                          <div class="mb-3">
                            <label for="romble" class="form-label">Barcode</label>
                            <h1>{!! DNS2D::getBarcodeSVG(auth()->user()->nis, 'QRCODE'); !!}</h1>


                          </div>
                    </div>
                    <div class="input-2" style="margin-left: 300px">

                        <div class="mb-4">
                            <label for="romble" class="form-label">rayon</label>
                            <h1>{{ auth()->user()->rayon }}</h1>
                        </div>
                        <div class="mb-3">
                          <label for="romble" class="form-label">romble</label>
                          <h1>{{ auth()->user()->romble }}</h1>

                        </div>

                    </div>
                </div>

                </form>
          </div>
    </div>
</div>
    <div class="data-diri" style="margin-top: 30px">
            <h1 style="text-align: center;margin-bottom: 20px;margin-top: 20px;font-weight: bold" class="text-muted" style="font-weight: bold">Postingan Anda</h1>

        <div class="profile-container">
            <div class="profile">
                <div class="all-profile" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    @foreach($post as $item)
                        @if($item->image)
                            <div class="profile-image">
                                <img style="width: 200px; height: 200px; object-fit: cover;" class="img-responsive" src="{{ asset('storage/' . $item->image) }}" alt="">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if(count($post) == 0)
                <h1 style="text-align: center; margin-bottom: 20px; margin-top: 40px; font-weight: bold;" class="text-muted">Anda Tidak Memiliki Post, <a href="/dashboard/post/create">Create Post disini</a></h1>
            @endif
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
