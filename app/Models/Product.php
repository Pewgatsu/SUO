<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function buildProduct(){
        return $this->hasMany(BuildProducts::class);
    }

    public function component(){
        return $this->hasOne(Component::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function store(){
        return $this->hasOne(Store::class);
    }
}
