@extends('layout.main')
@section('container')
<div class="container">
    
    <div class="row" style="margin-top: 10px">
        <div class="detail">
            <div class="flex items-center space-x-4">
                <!-- Avatar -->
                <div class="flex-shrink-0">
                    <img src="https://fisika.uad.ac.id/wp-content/uploads/blank-profile-picture-973460_1280.png" alt="Profile Picture" class="w-24 h-24 rounded-full">
                </div>
                <!-- User Info -->
                <div>
                    <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->rayon }}</p>
                    <p class="text-gray-600">{{ $user->romble }}</p>
                    <p class="text-gray-600">{{ $user->nis }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection