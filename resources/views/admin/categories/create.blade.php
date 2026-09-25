@extends('layouts.admin')
@section('title', 'Tambah Kategori')
@section('content')
    <h1 class="mb-6 text-2xl font-bold">Tambah Kategori</h1>
    <form method="POST" action="{{ route('admin.categories.store') }}" class="max-w-xl rounded bg-white p-6 shadow">
        @include('admin.categories._form')
    </form>
@endsection