@extends('layout.main')


@section('container')


<div class="user-container">
    <div class="user-article" style="display: flex; justify-content: space-between; align-items: center;">
      <div style="display: flex; align-items: center;">
          <img style="border-radius: 50%; max-width: 100px; max-height: 100px; width: 100px; height: 100px; object-fit: cover; margin-right: 10px;" class="img-responsive"
              src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}"
              alt="Profile Image">
          <div class="text-user">
              <p class="text-muted">Selamat Datang,</p>
              <h1 style="font-size: 20px; font-weight: bold;">{{ auth()->user()->name }}</h1>
          </div>
      </div>

      @yield('button')
  </div>

@endsection
