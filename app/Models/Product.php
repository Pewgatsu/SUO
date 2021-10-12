<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'store_id',
        'component_id',
        'price',
        'type',
        'status',
        'status_date',
        'description'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function build_products(){
        return $this->hasMany(BuildProduct::class);
    }

    public function builds(){
        return $this->belongsToMany(Build::class, 'build_products', 'product_id', 'build_id');
    }

    public function getCustomerFullName(){
        $account =  $this->build_products->where('status','!=','Available')->first()->build->account;
        return $account->firstname . ' ' . $account->lastname;
    }
}
