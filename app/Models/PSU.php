<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PSU extends Model
{
    use HasFactory;

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'psu_form_factor',
        'wattage',
        'efficiency_rating',
        'modular',
        'atx_connector',
        'eps_connector',
        'sata_connector',
        'molex_4pin_connector',
        'pcie_8pin_connector',
        'pcie_6+2pin_connector',
        'pcie_6pin_connector'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
