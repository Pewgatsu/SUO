<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
    use HasFactory;

    protected $table = 'motherboard';

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'cpu_socket',
        'mobo_form_factor',
        'mobo_chipset',
        'memory_slot',
        'memory_type',
        'max_mem_support',
        'mem_speed_support',
        'pcie_x16_slot',
        'pcie_x8_slot',
        'pcie_x4_slot',
        'pcie_x1_slot',
        'pci_slot',
        'm2_slot',
        'sata_6gb_slot',
        'sata_3gb_slot',
        'multigraphics_support',
        'ecc_support',
        'raid_support',
        'wireless_support'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
