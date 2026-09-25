@extends('layouts.admin')
@section('title', 'Edit ' . $title)
@section('content')
    <h1 class="mb-6 text-2xl font-bold">Edit {{ $title }}</h1>
    <form method="POST" action="{{ route($base . '.update', $item->id) }}" class="max-w-xl rounded bg-white p-6 shadow">
        @method('PUT')
        @include('admin.simple._form')
    </form>
@endsection