<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPUSocket extends Model
{
    use HasFactory;

    protected $table = 'cpu_sockets';

    protected $fillable = [
        'name'
    ];

    public function cpu_coolers(){
        return $this->belongsToMany(CPUCooler::class,'SocketCooler','cpu_socket_id','component_id');
    }
}
