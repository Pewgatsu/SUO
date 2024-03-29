<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $table = 'components';

    protected $fillable = [
        'image_path',
        'name',
        'type',
        'manufacturer',
        'series',
        'model',
        'color',
        'length',
        'width',
        'height'
    ];

    public function motherboard(){
        return $this->hasOne(Motherboard::class);
    }
    public function cpu(){
        return $this->hasOne(CPU::class);
    }

    public function cpu_cooler(){
        return $this->hasOne(CPUCooler::class);
    }

    public function graphics_card(){
        return $this->hasOne(GraphicsCard::class);
    }

    public function ram(){
        return $this->hasOne(RAM::class);
    }

    public function storage(){
        return $this->hasOne(Storage::class);
    }

    public function psu(){
        return $this->hasOne(PSU::class);
    }

    public function computer_case(){
        return $this->hasOne(ComputerCase::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function component_1_distances(){
        return $this->hasMany(ComponentDistance::class, 'component_id_1');
    }

    public function component_2_distances(){
        return $this->hasMany(ComponentDistance::class, 'component_id_2');
    }

    public function getProductsDateAdded(Store $store){
        return $this->products->where('store_id',$store->id)->sortByDesc('created_at')->first()->created_at;
    }

    public function getProductsCount(Store $store){
        return $this->products->where('store_id',$store->id)->count();
    }

    public function getProductsSold(Store $store){
        return $this->products->where('store_id',$store->id)->where('status','Sold Out')->count();
    }

    public function getProductsPrice(Store $store){
        return $this->products->where('store_id',$store->id)->sortBy('created_at')->first()->price;
    }
}
