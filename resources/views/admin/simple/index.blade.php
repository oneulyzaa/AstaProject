@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">{{ $title }}</h1>
        <a href="{{ route($base . '.create') }}" class="rounded bg-gray-900 px-4 py-2 text-sm text-white">+ Tambah</a>
    </div>

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Harga</th>
                    <th class="p-3">Dipakai di</th>
                    <th class="p-3">Status</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="border-t">
                        <td class="p-3 font-medium">{{ $item->name }}</td>
                        <td class="p-3">Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="p-3">{{ $item->products_count }} produk</td>
                        <td class="p-3">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="flex gap-3 p-3">
                            <a href="{{ route($base . '.edit', $item->id) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route($base . '.destroy', $item->id) }}"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="p-6 text-center text-gray-500">Belum ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $items->links() }}</div>
@endsection