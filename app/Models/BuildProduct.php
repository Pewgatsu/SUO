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
        'price',
        'type',
        'status',
        'status_date',
        'owned'
    ];

    public function build(){
        return $this->belongsTo(Build::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
