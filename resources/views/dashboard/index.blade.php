@extends('layout.main')

@section('container')
    @if (auth()->user())
        {!! $chartData->script() !!}

        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <!-- General Report -->
            <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">

                <!-- Card 1 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fas fa-laptop"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    12%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $pplg }}</h1>
                                <p>PPLG</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 1 -->

                <!-- Card 2 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-red-700 fad fa-store"></div>
                                <span class="rounded-full text-white badge bg-red-400 text-xs">
                                    6%
                                    <i class="fal fa-chevron-down ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $htl }}</h1>
                                <p>HTL</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 2 -->

                <!-- Card 3 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fas fa-pencil-alt"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    72%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $dkv }}</h1>
                                <p>DKV</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 3 -->

                <!-- Card 4 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-green-700 fad fa-users"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    150%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $tjkt }}</h1>
                                <p>TJKT</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 4 -->

            </div>
            <!-- End General Report -->

            <!-- Start Analytics -->
            <div class="mt-6 grid grid-cols-2 gap-6 xl:grid-cols-1">

                <!-- Update Section -->
                @if (auth()->user()->keterangan == true)
                    <div class="card bg-teal-400 border-teal-400 shadow-md text-white">
                        <div class="card-body flex flex-row">
                            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                                <img src="./img/happy.svg" alt="img title">
                            </div>
                            <div class="py-2 ml-10">
                                <h1 class="h6">Good Job, {{ auth()->user()->name }}!</h1>
                                <p class="text-white text-xs">Anda sudah absen hari ini.</p>
                                <ul class="mt-4">
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Finish Dashboard Design</li>
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i> Fix Issue #74</li>
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2"></i> Publish version 1.0.6</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card bg-red-400 border-red-400 shadow-md text-white">
                        <div class="card-body flex flex-row">
                            <div class="img-wrapper w-40 h-40 flex justify-center items-center">
                                <img src="./img/happy.svg" alt="img title">
                            </div>
                            <div class="py-2 ml-10">
                                <h1 class="h6">No, {{ auth()->user()->name }}!</h1>
                                <p class="text-white text-xs">Anda belum absen hari ini.</p>
                                <ul class="mt-4">
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i>Segera Absen!</li>
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2 mb-2"></i>Batas Absen Jam 16.00</li>
                                    <li class="text-sm font-light"><i class="fad fa-check-double mr-2"></i>Semangat Jalanin hari ini!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- End Update Section -->

                <!-- Charts Section -->
                <div class="flex flex-col">
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
                </div>
                <!-- End Charts Section -->

            </div>
            <!-- End Analytics -->

        </div>

    @else

        <div class="bg-gray-100 flex-1 p-6 md:mt-16">
            <!-- General Report -->
            <div class="grid grid-cols-4 gap-6 xl:grid-cols-1">

                <!-- Card 1 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fas fa-laptop"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    12%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $pplg }}</h1>
                                <p>PPLG</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 1 -->

                <!-- Card 2 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-red-700 fad fa-store"></div>
                                <span class="rounded-full text-white badge bg-red-400 text-xs">
                                    6%
                                    <i class="fal fa-chevron-down ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $htl }}</h1>
                                <p>HTL</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 2 -->

                <!-- Card 3 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fas fa-pencil-alt"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    72%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $dkv }}</h1>
                                <p>DKV</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 3 -->

                <!-- Card 4 -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-green-700 fad fa-users"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    150%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <div class="mt-8">
                                <h1 class="h5">{{ $tjkt }}</h1>
                                <p>TJKT</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- End Card 4 -->

            </div>
            <!-- End General Report -->

            <!-- Start Analytics -->
            <!-- You can handle the case where user is not authenticated here -->
        </div>

    @endif
@endsection
