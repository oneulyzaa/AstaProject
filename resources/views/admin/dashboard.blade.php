@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <h1 class="mb-6 text-2xl font-bold">Dashboard</h1>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
        @foreach ($stats as $label => $count)
            <div class="rounded bg-white p-4 shadow">
                <div class="text-sm text-gray-500">{{ $label }}</div>
                <div class="text-3xl font-bold">{{ $count }}</div>
            </div>
        @endforeach
    </div>
@endsection