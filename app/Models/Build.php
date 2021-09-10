<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $table = 'builds';


    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function buildProduct(){
        return $this->hasMany(BuildProducts::class);
    }
}
