<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
protected $guarded = [];
public function products() { return $this->belongsToMany(Product::class, 'product_materials')->withPivot('price'); }}
