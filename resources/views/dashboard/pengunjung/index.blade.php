@extends('layout.main')

@section('container')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    @if (session()->has('success'))
    <div id="imageErrorToast" class="toast align-items-center text-white bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
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
                        Name
                    </th>
                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Rayon
                    </th>
                    @can('admin')

                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Nis
                    </th>
                    @endcan
                    @can('admin')

                        <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                            Barcode
                        </th>
                    @endcan
                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Romble
                    </th>
                    @can('admin')
                    <th scope="col" class="px-2 py-2 font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                    @endcan
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-gray-600">
                @foreach ($data as $item)
                <tr>
                    <td class="px-2 py-2">{{ $loop->iteration }}</td>
                    <td class="px-2 py-2">{{ $item->name }}</td>

                    <td class="px-2 py-2">{{ $item->rayon }}</td>
                    @can('admin')

                    <td class="px-2 py-2">{{ $item->nis }}</td>
                    @endcan

                    @can('admin')

                        <td class="px-2 py-2">{!! DNS2D::getBarcodeSVG(auth()->user()->nis, 'QRCODE'); !!}</td>
                    @endcan

                    <td class="px-2 py-2">{{ $item->romble }}</td>
                    @can('admin')
                    <td class="px-2 py-2">
                        <div class="flex items-center space-x-2">
                            <a href="/dashboard/user/{{ $item->id }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                                <i class="bi bi-ticket-detailed-fill"></i>
                            </a>
                            <form action="/dashboard/user/{{ $item->id }}" method="POST" class="inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            <a href="/dashboard/user/{{ $item->id }}/edit"
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
