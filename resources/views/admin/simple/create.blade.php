@extends('layouts.admin')
@section('title', 'Tambah ' . $title)
@section('content')
    <h1 class="mb-6 text-2xl font-bold">Tambah {{ $title }}</h1>
    <form method="POST" action="{{ route($base . '.store') }}" class="max-w-xl rounded bg-white p-6 shadow">
        @include('admin.simple._form')
    </form>
@endsection