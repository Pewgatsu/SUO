<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPUCooler extends Model
{
    use HasFactory;

    protected $table = 'cpu_coolers';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'fan_speed',
        'noise_level',
        'water_cooled_support'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }

    public function cpu_sockets(){
        return $this->belongsToMany(CPUSocket::class,'socket_coolers','component_id','cpu_socket_id');
    }
}
