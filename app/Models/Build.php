<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $table = 'builds';
    protected $primaryKey = 'id';

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'build_products', 'build_id', 'product_id');
    }
}
