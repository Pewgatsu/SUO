<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $table = 'builds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id',
        'build_name',
        'total_price',
        'build_description'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'build_products', 'build_id', 'product_id');
    }

    public function build_products(){
        return $this->hasMany(BuildProduct::class);
    }
}
