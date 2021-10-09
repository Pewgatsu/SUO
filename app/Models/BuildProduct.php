<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildProduct extends Model
{
    use HasFactory;
    protected $table = 'build_products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'build_id',
        'product_id',
        'description',
        'price',
        'type',
        'status',
        'status_date',
        'owned'
    ];

    public function builds(){
        return $this->belongsTo(Build::class);
    }
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
