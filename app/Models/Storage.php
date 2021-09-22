<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storage';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'storage_type',
        'storage_capacity',
        'interface',
        'storage_form_factor',
        'storage_cache',
        'nvme'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
