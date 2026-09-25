<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeChart extends Model
{
// SizeChart
protected $guarded = [];
public function items()    { return $this->hasMany(SizeChartItem::class)->orderBy('sort_order'); }
public function products() { return $this->hasMany(Product::class); }
}
