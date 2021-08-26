<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RAM extends Model
{
    use HasFactory;

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'memory_type',
        'memory_speed',
        'memory_capacity',
        'memory_form_factor',
        'modules',
        'memory_voltage',
        'memory_timings',
        'ecc',
        'registered',
        'heat_spreader'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
