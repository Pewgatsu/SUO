<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPU extends Model
{
    use HasFactory;

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'cpu_socket',
        'microarchitecture',
        'core_count',
        'thread_count',
        'base_clock',
        'boost_clock',
        'max_mem_support',
        'tdp',
        'smt_support',
        'ecc_support',
        'integrated_graphics'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
