<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomizationOption extends Model
{
protected $guarded = [];
public function products() { return $this->belongsToMany(Product::class, 'product_options')->withPivot('price'); }}
