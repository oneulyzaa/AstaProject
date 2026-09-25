@extends('layouts.admin')
@section('title', 'Edit Kategori')
@section('content')
    <h1 class="mb-6 text-2xl font-bold">Edit Kategori</h1>
    <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="max-w-xl rounded bg-white p-6 shadow">
        @method('PUT')
        @include('admin.categories._form')
    </form>
@endsection