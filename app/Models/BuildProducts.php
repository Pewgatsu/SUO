<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildProducts extends Model
{
    use HasFactory;

    protected $table = 'build_products';

    public function builds(){
        return $this->belongsTo(Build::class,'build_id');
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
