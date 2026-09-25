@csrf
<div class="space-y-4">
    <div>
        <label class="mb-1 block text-sm font-medium">Nama</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full rounded border-gray-300">
        @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Slug <span class="text-gray-400">(kosongkan untuk otomatis)</span></label>
        <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded border-gray-300">
        @error('slug') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Deskripsi</label>
        <textarea name="description" rows="3" class="w-full rounded border-gray-300">{{ old('description', $category->description) }}</textarea>
        @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium">Urutan</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $category->sort_order ?? 0) }}" class="w-32 rounded border-gray-300">
        @error('sort_order') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
    </div>
    <label class="flex items-center gap-2 text-sm">
        <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $category->is_active))>
        Aktif
    </label>
    <div class="flex gap-3">
        <button class="rounded bg-gray-900 px-4 py-2 text-sm text-white">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-sm text-gray-600">Batal</a>
    </div>
</div>