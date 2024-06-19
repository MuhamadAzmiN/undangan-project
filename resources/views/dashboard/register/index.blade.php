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

<div class="row justify-content-center">
    <div class="col-md-5" style="margin-top:70px;">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="/register">
              @csrf
            
              <h1 class="h3 mb-3 fw-normal">Please Register</h1>
          
              <div class="form-floating">
                <input type="text" value="{{ old("name") }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com">
                <label for="name">Name</label>
                @error('name')
                  <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                
              </div>
            
              <div class="form-floating">
                <input type="text" value="{{ old("rayon") }}" name="rayon" class="form-control @error('rayon') is-invalid @enderror" id="rayon" placeholder="rayon">
                <label for="rayon">rayon</label>
                @error('rayon')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="number" value="{{ old("nis") }}" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" placeholder="nis">
                <label for="nis">Nis</label>
                @error('Nis')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="text" value="{{ old("romble") }}" name="romble" class="form-control @error('romble') is-invalid @enderror" id="romble" placeholder="romble">
                <label for="romble">romble</label>
                @error('romble')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" value="{{ old("password") }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                <label for="password">Password</label>
                @error('password')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
          
              <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
              
            </form>
            <small class="d-block text-center mt-3">Not Login? <a href="login/">Login Now</a></small>
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
