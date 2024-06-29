@extends('layout.main')

@section('container')

<div class="col-span-6 card flex flex-col">

    <div class="px-3 border-b">
        <form action="" class="flex">
            <input class="p-3 flex-1" type="text" placeholder="search">
            <button type="submit" class="p-3">
                <i class="fad fa-search"></i>
            </button>
        </form>
    </div>
 
    <div class="flex-1 flex flex-col">

        <!-- message -->

        @foreach ($user as $item)
        <div class="flex items-center shadow-xs transition-all duration-300 ease-in-out p-5 hover:shadow-md">
            <div class="w-10 h-10 overflow-hidden rounded-md">
                <img class="img-responsive" src="/img/user1.jpg" alt="">
            </div>    
            <h1 style="" class="ml-3">{{ $item->name }}</h1>    
            <p class="ml-6 flex-1 text-xs">@if ($item->keterangan == true)
                Sudah Absen
            @else
                Belum Absen
            @endif<i class="fad fa-circle {{ $item->keterangan == true ? "text-green-500" : "text-red-500" }}"></i></p>


            <p class="font-bold text-gray-900">{{ $item->created_at }}</p>
        </div>



    </div>

    <div class="card-footer flex justify-between">
        <p>4.41 GB (25%) of 17 GB used Manage</p>
        <p>Last account activity: 36 minutes ago</p>
    </div>
</div>

  </div>
    
@endsection












