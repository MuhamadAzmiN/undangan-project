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
                <div class="input-all">
                    <div class="input-1">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" value="{{ auth()->user()->name }}">
                            {{-- @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                            @enderror --}}
                          
                          </div>
                          <div class="mb-3">
                            <label for="nis" class="form-label">nis</label>
                            <input type="number" class="form-control @error('nis') is-invalid @enderror"  id="nis" name="nis" value="{{ auth()->user()->nis }}">
            
                          
                          </div>
                    </div>
                    <div class="input-2">
    
                        <div class="mb-3">
                          <label for="rayon" class="form-label">rayon</label>
                          <input type="text" class="form-control @error('rayon') is-invalid @enderror"  id="rayon" name="rayon" value="{{ auth()->user()->rayon }}">
                      
                        </div>
                        <div class="mb-3">
                          <label for="romble" class="form-label">romble</label>
                          <input type="text" class="form-control @error('romble') is-invalid @enderror"  id="romble" name="romble" value="{{ auth()->user()->romble }}">
                      
                        
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