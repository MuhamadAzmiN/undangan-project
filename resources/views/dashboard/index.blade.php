
@extends('layout.main')

@section('container')
    
{!! $chartData->script() !!}
  <div class="bg-gray-100 flex-1 p-6 md:mt-16"> 

    
    <!-- General Report -->
    <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-indigo-700 fas fa-laptop"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        12%
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{ $pplg }}</h1>
                    <p>PPLG</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-red-700 fad fa-store"></div>
                    <span class="rounded-full text-white badge bg-red-400 text-xs">
                        6%
                        <i class="fal fa-chevron-down ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{ $htl }}</h1>
                    <p>HTL</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-indigo-700 fas fa-pencil-alt"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        72%
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{ $dkv }}</h1>
                    <p>DKV</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->


    <!-- card -->
    <div class="report-card">
        <div class="card">
            <div class="card-body flex flex-col">
                
                <!-- top -->
                <div class="flex flex-row justify-between items-center">
                    <div class="h6 text-green-700 fad fa-users"></div>
                    <span class="rounded-full text-white badge bg-teal-400 text-xs">
                        150%
                        <i class="fal fa-chevron-up ml-1"></i>
                    </span>
                </div>
                <!-- end top -->

                <!-- bottom -->
                <div class="mt-8">
                    <h1 class="h5">{{ $tjkt }}</h1>
                    <p>TJKT</p>
                </div>                
                <!-- end bottom -->
    
            </div>
        </div>
        <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
    </div>
    <!-- end card -->
    

</div>
    <!-- End General Report -->

    <!-- strat Analytics -->
    <div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

    <!-- update section -->

    @if (auth()->user()->keterangan == true)
    <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
        <div class="card-body flex flex-row">
            
            <!-- image -->
            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                <img src="./img/happy.svg" alt="img title">
            </div>
            <!-- end image -->

            <!-- info -->
            <div class="py-2 ml-10">
                <h1 class="h6">Good Job, {{ auth()->user()->name }}!</h1>
                <p class="text-white text-xs">Anda sudah absen hari ini.</p>

                <ul class="mt-4">
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Finish Dashboard Design</li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Fix Issue #74</li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2"></i> Publish version 1.0.6</li>
                </ul>
            </div>
            <!-- end info -->

        </div>
    </div>
    @else
    <div class="card bg-red-400 border-red-400 shadow-md text-white">
        <div class="card-body flex flex-row">
            
            <!-- image -->
            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                <img src="./img/happy.svg" alt="img title">
            </div>
            <!-- end image -->
    
            <!-- info -->
            <div class="py-2 ml-10">
                <h1 class="h6">No, {{ auth()->user()->name }}!</h1>
                <p class="text-white text-xs">Anda belum absen hari ini.</p>
    
                <ul class="mt-4">
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i>Segera Absen!</li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i>Batas Absen Jam 16.00</li>
                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2"></i>Semangat Jalanin hari ini!</li>
                </ul>
            </div>
            <!-- end info -->
    
        </div>
    </div>
    @endif
    <!-- end update section -->

    <!-- carts -->
    <div class="flex flex-col">

        <!-- alert -->
        <div class="alert alert-dark mb-6">
            Hi! Wait A Minute . . . . . . Follow Me On Twitter 
            <a class="ml-2" target="_blank" href="https://twitter.com/MohamedSaid__">{{ auth()->user()->name }}</a>
        </div>
        <!-- end alert -->

        <!-- charts -->
        <div class="grid grid-cols-2 gap-6 h-full">

            <div class="card">
                <div class="py-3 px-4 flex flex-row justify-between">
                    <h1 class="h6">

                        {{-- {!! $chartData->container() !!} --}}
                    </h1>

                    
                </div>                
                
            </div>

            <div class="card">
                <div class="py-3 px-4 flex flex-row justify-between">                    
                    <h1 class="h6">
                        <span class="num-2"></span>k
                        <p>Unique Users</p>
                    </h1>

                    <div class="bg-indigo-200 text-indigo-700 border-indigo-300 border w-10 h-10 rounded-full flex justify-center items-center">
                        <i class="fad fa-users-crown"></i>
                    </div>
                </div>
            
            </div>

        </div>     
        <!-- charts    -->

    </div>
    <!-- end charts -->


</div>
    <!-- end Analytics -->

    <!-- Sales Overview -->
    <div class="card mt-6">


</div>
    <!-- end Sales Overview -->

    <!-- start numbers -->
    {{-- <div class="grid grid-cols-5 gap-6 xl:grid-cols-2">

    <!-- card -->
    <div class="card mt-6">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                <i class="fad fa-wallet"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"></h1>
                <p class="text-xs"><span class="num-2"></span> payments</p>
            </div>

        </div>
    </div>
    <!-- end card -->
    
    <!-- card -->
    <div class="card mt-6">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                <i class="fad fa-shopping-cart"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> Orders</h1>
                <p class="text-xs"><span class="num-2"></span> items</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 xl:mt-1">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-yellow-600 text-white mr-3">
                <i class="fad fa-blog"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> posts</h1>
                <p class="text-xs"><span class="num-2"></span> active</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 xl:mt-1">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                <i class="fad fa-comments"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> comments</h1>
                <p class="text-xs"><span class="num-2"></span> approved</p>
            </div>

        </div>
    </div>
    <!-- end card -->

    <!-- card -->
    <div class="card mt-6 xl:mt-1 xl:col-span-2">
        <div class="card-body flex items-center">
            
            <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                <i class="fad fa-user"></i>
            </div>

            <div class="flex flex-col">
                <h1 class="font-semibold"><span class="num-2"></span> memebrs</h1>
                <p class="text-xs"><span class="num-2"></span> online</p>
            </div>

        </div>
    </div>
    <!-- end card -->

</div>
    <!-- end nmbers -->

    <!-- start quick Info -->
    <div class="grid grid-cols-3 gap-6 mt-6 xl:grid-cols-1">


    <!-- Browser Stats -->
    <div class="card">
        <div class="card-header">Browser Stats</div>

        <!-- brawser -->
        <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b">
            <div class="flex items-center">
                <i class="fab fa-chrome mr-4"></i>    
                <h1>google chrome</h1>
            </div>                
            <div>
                <span class="num-2"></span>%
            </div>
        </div>
        <!-- end brawser -->

        <!-- brawser -->
        <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b">
            <div class="flex items-center">
                <i class="fab fa-firefox mr-4"></i>    
                <h1>firefox</h1>
            </div>                
            <div>
                <span class="num-2"></span>%
            </div>
        </div>
        <!-- end brawser -->

        <!-- brawser -->
        <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b">
            <div class="flex items-center">
                <i class="fab fa-internet-explorer mr-4"></i>    
                <h1>internet explorer</h1>
            </div>             p   
            <div>
                <span class="num-2"></span>%
            </div>
        </div>
        <!-- end brawser -->

        <!-- brawser -->
        <div class="p-6 flex flex-row justify-between items-center text-gray-600 border-b-0">
            <div class="flex items-center">
                <i class="fab fa-safari mr-4"></i>    
                <h1>safari</h1>
            </div>                
            <div>
                <span class="num-2"></span>%
            </div>
        </div>
        <!-- end brawser -->

    </div> --}}
    <!-- end Browser Stats -->

    <!-- Start Recent Sales -->
     @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{  session('success') }}
          </div>
        @endif
    <div class="card col-span-2 xl:col-span-1">
        <div class="card-header"><span style="text-align: center">Data Pengunjung</span>
        </div>
        <table class="table-auto w-full text-left">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-r">No</th>
                    <th class="px-4 py-2 border-r">Name</th>
                    <th class="px-4 py-2 border-r">Nis</th>
                    <th class="px-4 py-2 border-r">Romble</th>
                    @can('admin')
                    <th class="px-4 py-2 border-r">Aksi</th>
                        
                    @endcan
                    
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($data as $item)
                <tr>                    
                    <td class="border border-l-0 px-4 py-2 text-center text-green-500">{{ $loop->iteration }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->name }}</td>
                    <td class="border border-l-0 px-4 py-2">{{ $item->nis }}</td>
                    <td class="border border-l-0 border-r-0 px-4 py-2">{{ $item->romble }}</td>
                    @can('admin')
                    <td class="border border-l-0 border-r-0 px-4 py-2">
                
                        
                    <a class="badge bg-info" href="/dashboard/user/{{ $item->id }}">
                        <i class="bi bi-ticket-detailed-fill Smaller heading"></i>
                    </a>
                    <form class="d-inline" action="/dashboard/user/{{ $item->id }}" method="POST">
                        @method('delete')
                        @csrf
                        
                        <button onclick="return confirm('Are You Sure?')" class=" badge bg-danger border-0"> <i class="bi bi-trash2"></i></i></button>
                    </form>
                    <a class="badge bg-warning" href="/dashboard/user/{{ $item->id }}/edit">
                        <i class="bi bi-ticket-detailed-fill Smaller heading"></i>
                    </a>
                </td>
                @endcan
            </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- End Recent Sales -->


</div>
    <!-- end quick Info -->
        

  </div>
  <!-- end content -->

</div>
<!-- end wrapper -->

<!-- script -->
{!! $chartData->script() !!}
@endsection