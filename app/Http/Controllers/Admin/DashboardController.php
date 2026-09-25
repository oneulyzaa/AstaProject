<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    return view('admin.dashboard', [
        'stats' => [
            'Kategori' => \App\Models\Category::count(),
            'Produk' => \App\Models\Product::count(),
            'Material' => \App\Models\Material::count(),
            'Portfolio' => \App\Models\Portfolio::count(),
        ],
    ]);
}
}
