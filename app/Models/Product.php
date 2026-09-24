<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
protected $casts = ['is_featured' => 'boolean', 'is_active' => 'boolean'];

public function category()  { return $this->belongsTo(Category::class); }
public function sizeChart() { return $this->belongsTo(SizeChart::class); }
public function images()    { return $this->hasMany(ProductImage::class)->orderBy('sort_order'); }
public function portfolios(){ return $this->hasMany(Portfolio::class); }

public function materials()
{
    return $this->belongsToMany(Material::class, 'product_materials')
        ->withPivot('price')->withTimestamps();
}

public function options()
{
    return $this->belongsToMany(CustomizationOption::class, 'product_options')
        ->withPivot('price')->withTimestamps();
}
}
