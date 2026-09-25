<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
// PortfolioImage
protected $guarded = [];
public function portfolio() { return $this->belongsTo(Portfolio::class); }
}
