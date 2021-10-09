<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComponentDistance extends Model
{
    use HasFactory;

    protected $table = 'component_distances';

    protected $primaryKey = 'component_id_1';

    protected $fillable = [
        'component_id_1',
        'component_id_2',
        'distance'
    ];

    public function component_id_1(){
        $this->belongsTo(Component::class,'id','component_id_1');
    }

    public function component_id_2(){
        $this->belongsTo(Component::class,'id','component_id_2');
    }
}
