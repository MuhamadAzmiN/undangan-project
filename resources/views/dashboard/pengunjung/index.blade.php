@extends('layout.main')

@section('container')
<div class="bg-gray-100 flex-1 p-6 md:mt-16">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
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
                        Nis
                    </th>
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
                    <td class="px-2 py-2">{{ $item->nis }}</td>
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
@endsection
