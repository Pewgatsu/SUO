<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id',
        'banner',
        'name',
        'address',
        'description',
         'location',
        'featured_motherboards',
        'featured_cpus',
        'featured_cpu_coolers',
        'featured_graphics_cards',
        'featured_rams',
        'featured_storages',
        'featured_psus',
        'featured_computer_cases'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
