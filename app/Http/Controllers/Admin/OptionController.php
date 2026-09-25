<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomizationOption;

class OptionController extends SimpleCatalogController
{
    protected function model(): string { return CustomizationOption::class; }
    protected function title(): string { return 'Product Options'; }
    protected function base(): string  { return 'admin.options'; }
}