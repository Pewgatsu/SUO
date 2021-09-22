<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraphicsCard extends Model
{
    use HasFactory;

    protected $table = 'graphics_card';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'gpu_chipset',
        'gpu_memory',
        'gpu_memory_type',
        'base_clock',
        'boost_clock',
        'interface',
        'tdp',
        'multigraphics_support',
        'frame_sync',
        'dvi_port',
        'hdmi_port',
        'mini_hdmi_port',
        'displayport_port',
        'mini_displayport_port',
        'e_slot_width',
        'external_power',
        'cooling'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
