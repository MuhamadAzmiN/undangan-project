<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="./images/logo.png">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="instascan.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
{{-- my style --}}


<div class="row justify-content-center">
  <div class="col-md-5 m-7" style="margin-top:200px">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
      <main class="form-signin w-100 m-auto">
          <form action="/login" method="post">
            @csrf            
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
        
            <div class="form-floating">
              <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" id="name" placeholder="Your Name" autofocus required>
              <label for="name">Name</label>
              @error("name")
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="remember">
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            <div class="mt-3">
              <a href="/forgot-password">Forgot Password?</a>
            </div>
          </form>
          <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now</a></small>
        </main>
  </div>
</div>

<body>

  {{-- <script src="/js/timeTable.js"></script> --}}
  <script src="/js/app2.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.ne
  t/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>
