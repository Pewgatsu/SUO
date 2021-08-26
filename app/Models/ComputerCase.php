<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerCase extends Model
{
    use HasFactory;

    protected $primaryKey = 'component_id';

    protected $fillable = [
        'component_id',
        'case_type',
        'mobo_form_factor',
        'power_supply',
        'power_supply_shroud',
        'side_panel_window',
        'water_cooled_support',
        'cooler_clearance',
        'graphics_clearance',
        'psu_clearance',
        'full_height_e_slot',
        'half_height_e_slot',
        'external_525_bay',
        'external_350_bay',
        'internal_350_bay',
        'internal_250_bay'
    ];

    public function component(){
        return $this->belongsTo(Component::class);
    }
}
