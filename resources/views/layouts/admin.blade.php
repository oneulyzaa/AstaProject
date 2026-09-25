<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">
@php
    $menus = [
        'dashboard' => 'Dashboard',
        'categories' => 'Categories',
        'products' => 'Products',
        'materials' => 'Materials',
        'options' => 'Product Options',
        'size-charts' => 'Size Charts',
        'portfolios' => 'Portfolio',
        'settings' => 'Settings',
    ];
@endphp
<div x-data="{ open: false }" class="min-h-screen md:flex">
    {{-- Sidebar --}}
    <aside class="fixed inset-y-0 left-0 z-30 w-60 -translate-x-full bg-gray-900 p-4 text-gray-200 transition md:static md:translate-x-0"
           :class="{ 'translate-x-0': open }">
        <div class="mb-6 text-lg font-bold">ASTA Admin</div>
        <nav class="space-y-1 text-sm">
            @foreach ($menus as $key => $label)
                @php $name = $key === 'dashboard' ? 'admin.dashboard' : "admin.$key.index"; @endphp
                @if (Route::has($name))
                    <a href="{{ route($name) }}"
                       class="block rounded px-3 py-2 hover:bg-gray-800 {{ request()->routeIs($key === 'dashboard' ? $name : "admin.$key.*") ? 'bg-gray-800' : '' }}">
                        {{ $label }}
                    </a>
                @endif
            @endforeach
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button class="text-sm text-gray-400 hover:text-white">Logout</button>
        </form>
    </aside>

    <div class="flex-1">
        <header class="flex items-center gap-3 bg-white p-4 shadow md:hidden">
            <button @click="open = !open" class="text-2xl">☰</button>
            <span class="font-semibold">ASTA Admin</span>
        </header>

        <main class="mx-auto max-w-5xl p-4 md:p-8">
            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 px-4 py-3 text-sm text-green-800">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 rounded bg-red-100 px-4 py-3 text-sm text-red-800">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>