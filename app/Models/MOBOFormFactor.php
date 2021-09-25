<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOBOFormFactor extends Model
{
    use HasFactory;

    protected $table = 'mobo_form_factors';

    protected $fillable = [
        'name'
    ];

    public function computer_cases(){
        return $this->belongsToMany(ComputerCase::class,'mobo_cases','mobo_form_factor_id','component_id');
    }
}
