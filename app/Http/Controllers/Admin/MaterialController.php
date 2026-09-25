<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;

class MaterialController extends SimpleCatalogController
{
    protected function model(): string { return Material::class; }
    protected function title(): string { return 'Materials'; }
    protected function base(): string  { return 'admin.materials'; }
}