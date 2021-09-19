<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocketCooler extends Model
{
    use HasFactory;

    protected $table = 'socket_coolers';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'cpu_socket_id'
    ];
}
