<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;
    protected $fillable = [
        'component_image',
        'component_name',
        'component_type',
        'component_price',
    ];
}
