<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MOBOMemorySpeed extends Model
{
    use HasFactory;

    protected $table = 'mobo_memory_speeds';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'memory_speed_id'
    ];
}
