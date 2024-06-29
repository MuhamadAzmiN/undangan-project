<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5 m-7" style="margin-top:50px">
       @if (session()->has('registerError'))
       <div style="margin-left:100px;margin-bottom:20px" id="imageErrorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="d-flex">
              <div class="toast-body d-flex justify-content-center">
                  {{ session('registerError') }}
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
      </div>
       @endif
   
      <div class="card">
        <div class="card-body">
          <form class="form" method="post" action="/register">
            @csrf
            <div class="flex-column ">
              <label>Nama</label>
              <div class="inputForm">
                <input type="text"  value="{{ old("name") }}" class="input form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan Nama Anda" autofocus required>
              </div>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="flex-column ">
              <label>Rayon</label>
              <div class="inputForm">
                <input type="text" value="{{ old("rayon") }}" class="input form-control @error('rayon') is-invalid @enderror" id="rayon" name="rayon" placeholder="Masukkan rayon Anda" required>
              </div>
              @error('rayon')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="flex-column">
              <label for="romble">Rayon</label>
              <div class="inputForm">
                  <select class="form-select @error('romble') is-invalid @enderror" id="romble" name="romble" required>
                      <option value="">Pilih Romble Anda</option>
                      <option value="PPLG" {{ old('romble') == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                      <option value="TJKT" {{ old('romble') == 'TJKT' ? 'selected' : '' }}>TJKT</option>
                      <option value="DKV" {{ old('romble') == 'DKV' ? 'selected' : '' }}>DKV</option>
                      <option value="HOTEL" {{ old('romble') == 'HOTEL' ? 'selected' : '' }}>HOTEL</option>
                      <option value="MPLB" {{ old('romble') == 'MPLB' ? 'selected' : '' }}>MPLB</option>
                      <option value="KLN" {{ old('romble') == 'KLN' ? 'selected' : '' }}>KLN</option>
                      <option value="PMN" {{ old('romble') == 'PMN' ? 'selected' : '' }}>PMN</option>
                  </select>
              </div>
              @error('romble')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>

          <div class="flex-column ">
            <label>Nis</label>
            <div class="inputForm">
              <input type="text" value="{{ old("nis") }}" class="input form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="Masukkan Nis anda" required>
            </div>
            @error('nis')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
            <div class="flex-column ">
              <label>Password</label>
              <div class="inputForm">
                <input type="password" value="{{ old("password") }}" class="input form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password Anda" required>
              </div>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            


            <button style="background-color: black;" class="button-submit btn btn-primary w-100 py-2" type="submit">Daftar</button>

            <p class="p mt-3 text-center">Sudah punya akun? <a href="/login">Masuk</a></p>
          </form>
        </div>
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

      @if (session()->has('registerError'))
          toast.show();
      @endif

      @if (session()->has('success'))
          toast.show();
      @endif
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/js/app2.js"></script>
</body>
</html>
