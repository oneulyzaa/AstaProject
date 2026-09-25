<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
// Portfolio
protected $guarded = [];
public function images()   { return $this->hasMany(PortfolioImage::class)->orderBy('sort_order'); }
public function category() { return $this->belongsTo(Category::class); }
public function product()  { return $this->belongsTo(Product::class); }

}
