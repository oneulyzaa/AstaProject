<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizeChartItem extends Model
{
// SizeChartItem
protected $guarded = [];
public function sizeChart() { return $this->belongsTo(SizeChart::class); }}
