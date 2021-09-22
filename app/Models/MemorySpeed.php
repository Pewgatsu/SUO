<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemorySpeed extends Model
{
    use HasFactory;

    protected $table = 'memory_speeds';

    protected $fillable = [
        'name'
    ];

    public function motherboards(){
        return $this->belongsToMany(Motherboard::class,'mobo_memory_speeds','memory_speed_id','component_id');
    }
}
