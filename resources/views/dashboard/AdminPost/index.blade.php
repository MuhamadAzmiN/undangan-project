@extends('layout.main')

@section('container')
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        @if (session()->has('success'))
            <div id="imageErrorToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body d-flex justify-content-center">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- @if (session()->has('success'))
        <div id="imageErrorToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
           <div class="d-flex">
               <div class="toast-body d-flex justify-content-center">
                   {{ session('success') }}
               </div>
               <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
           </div>
       </div>
        @endif --}}
        @if (session()->has('danger'))
            <div id="imageErrorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body d-flex justify-content-center">
                        {{ session('danger') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        No
                    </th>
                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Postingan
                    </th>


                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Username
                    </th>

                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Body
                    </th>

                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Waktu Postingan
                    </th>
                    @can('admin')
                        <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    @endcan
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                @foreach ($postingan as $item)
                    <tr>
                        <td class="px-2 py-2">{{ $loop->iteration }}</td>
                        <td class="px-2 py-2">

                            <div class="w-10 h-10 overflow-hidden rounded-full">
                                <img class="img-responsive" src="{{ $item->image ? asset('storage/' . $item->image) : 'https://th.bing.com/th/id/OIP.dcLFW3GT9AKU4wXacZ_iYAAAAA?rs=1&pid=ImgDetMain' }}" alt="">
                            </div>
                        </td>
                        <td class="px-2 py-2">{{ $item->user->name }}</td>
                        <td class="px-2 py-2">{{ $item->body }}</td>

                        <td class="px-2 py-2">{{ $item->created_at }}</td>

                        @can('admin')
                            <td class="px-2 py-2">
                                <div class="flex items-center space-x-2">
                                    <a href="/dashboard/adminPost/{{ $item->id }}"
                                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                        <i class="bi bi-ticket-detailed-fill"></i>
                                    </a>
                                    <form action="/dashboard/adminPost/{{ $item->id }}" method="POST" class="inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <a href="/dashboard/adminPost/{{ $item->id }}/edit"
                                       class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <script>
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

            @if (session()->has('info'))
            toast.show();
            @endif
        });
    </script>
@endsection
