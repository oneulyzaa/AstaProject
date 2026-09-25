<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class SimpleCatalogController extends Controller
{
    abstract protected function model(): string;   // class model
    abstract protected function title(): string;   // judul halaman
    abstract protected function base(): string;    // prefix nama route

    public function index()
    {
        $items = ($this->model())::withCount('products')->orderBy('name')->paginate(15);

        return view('admin.simple.index', [
            'items' => $items, 'title' => $this->title(), 'base' => $this->base(),
        ]);
    }

    public function create()
    {
        return view('admin.simple.create', [
            'item' => new ($this->model())(['is_active' => true, 'price' => 0]),
            'title' => $this->title(), 'base' => $this->base(),
        ]);
    }

    public function store(Request $request)
    {
        ($this->model())::create($this->validated($request));

        return redirect()->route($this->base() . '.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        return view('admin.simple.edit', [
            'item' => ($this->model())::findOrFail($id),
            'title' => $this->title(), 'base' => $this->base(),
        ]);
    }

    public function update(Request $request, int $id)
    {
        ($this->model())::findOrFail($id)->update($this->validated($request));

        return redirect()->route($this->base() . '.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $item = ($this->model())::findOrFail($id);

        if ($item->products()->exists()) {
            return back()->with('error', 'Masih dipakai produk, tidak bisa dihapus. Nonaktifkan saja.');
        }

        $item->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}