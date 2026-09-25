@extends('layouts.admin')
@section('title', 'Categories')
@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('admin.categories.create') }}" class="rounded bg-gray-900 px-4 py-2 text-sm text-white">+ Tambah</a>
    </div>

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="p-3">Nama</th>
                    <th class="p-3">Slug</th>
                    <th class="p-3">Produk</th>
                    <th class="p-3">Urutan</th>
                    <th class="p-3">Status</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-t">
                        <td class="p-3 font-medium">{{ $category->name }}</td>
                        <td class="p-3 text-gray-500">{{ $category->slug }}</td>
                        <td class="p-3">{{ $category->products_count }}</td>
                        <td class="p-3">{{ $category->sort_order }}</td>
                        <td class="p-3">{{ $category->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td class="flex gap-3 p-3">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                  onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="p-6 text-center text-gray-500">Belum ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $categories->links() }}</div>
@endsection