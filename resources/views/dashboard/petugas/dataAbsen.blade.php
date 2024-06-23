@extends('layout.main')

@section('container')

{!! $chart->script() !!}
<div class="col-span-8 card" style="width: 1120px">

    <div class="px-3 border-b">
        <form action="/dashboard/dataAbsen" class="flex">
            <input class="p-3 flex-1" type="text" placeholder="Search" name="seacrh" value="{{ request('seacrh') }}">
            <button type="submit" class="p-3">
                <i class="fad fa-search"></i>
            </button>
        </form>
    </div>

    <div class="overflow-x-auto mt-6">
        <div class="min-w-full overflow-hidden overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        @can('admin')
                            
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($user as $item)
                    <tr class="hover:bg-gray-100 transition-all duration-300 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Nama -->
                            <div class="flex items-center">
                                <div class="w-10 h-10 overflow-hidden rounded-full">
                                    <img class="img-responsive" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Status -->
                            <div class="flex items-center">
                                <span class="mr-2">
                                    @if ($item->keterangan)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Sudah Absen
                                    </span>
                                    @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Belum Absen
                                    </span>
                                    @endif
                                </span>
        
                                        
                                    
                                <i class="fad fa-circle {{ $item->keterangan == true ? "text-green-500" : "text-red-500" }}"></i>
                            </div>
                        </td>

                        @foreach ($item->absens as $absen)
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <!-- Waktu Dibuat -->
                            @if ($item->keterangan)

                            
                                
                                {{ $absen->created_at }}
                                
                                @elseif(!$item->keterangan) 
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Segera Absensi
                                </span>
                                @endif
                            </td>
                            
                            @can('admin')
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <!-- Waktu Dibuat -->
                                
                            @if ($item->keterangan)
                                {{-- {{ $absen->created_at }} --}}
                                
                                <form action="/dashboard/petugas/{{ $absen->id }}" method="post">
                                    @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">HAPUS</button>
                                    
                                </form>
                                
                                @else 
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Segera Absensi
                                </span>
                                @endif
                            </td>
                            @endcan
                            
                            <td>
                                
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{!! $chart->script() !!}
@endsection