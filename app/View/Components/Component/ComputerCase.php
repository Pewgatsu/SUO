<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class ComputerCase extends Component
{
    public $moboFormFactors;
    public $mode;
    public $computerCase;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($moboFormFactors, $mode, $computerCase = null)
    {
        $this->moboFormFactors = $moboFormFactors;
        $this->mode = $mode;
        $this->computerCase = $computerCase;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_computer_case';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_computer_case_' . $this->computerCase->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_computer_case');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.computer_cases.edit', $this->computerCase->component);
        }
        else {
            return null;
        }
    }

    public function setTitle(){
        if (strtolower($this->mode) === 'add'){
            return 'Add';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'Edit';
        }
        else {
            return null;
        }
    }

    public function setMOBOFormFactorID(){
        if (strtolower($this->mode) === 'add'){
            return 'case_mobo_form_factor';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'case_mobo_form_factor_' . $this->computerCase->component->id;
        }
        else {
            return null;
        }
    }

    public function oldField($string){
        if (strtolower($this->mode) === 'edit'){
            switch ($string){
                case 'case_name':
                    return $this->computerCase->component->name;
                case 'case_manufacturer':
                    return $this->computerCase->component->manufacturer;
                case 'case_series':
                    return $this->computerCase->component->series;
                case 'case_model':
                    return $this->computerCase->component->model;
                case 'case_color':
                    return $this->computerCase->component->color;
                case 'case_length':
                    return $this->computerCase->component->length;
                case 'case_width':
                    return $this->computerCase->component->width;
                case 'case_height':
                    return $this->computerCase->component->height;
                case 'case_type':
                    return $this->computerCase->case_type;
                case 'case_power_supply':
                    return $this->computerCase->power_supply;
                case 'case_power_supply_shroud':
                    return $this->computerCase->power_supply_shroud;
                case 'case_side_panel_window':
                    return $this->computerCase->side_panel_window;
                case 'case_water_cooled_support':
                    return $this->computerCase->water_cooled_support;
                case 'case_cooler_clearance':
                    return $this->computerCase->cooler_clearance;
                case 'case_graphics_clearance':
                    return $this->computerCase->graphics_clearance;
                case 'case_psu_clearance':
                    return $this->computerCase->psu_clearance;
                case 'case_full_height_e_slot':
                    return $this->computerCase->full_height_e_slot;
                case 'case_half_height_e_slot':
                    return $this->computerCase->half_height_e_slot;
                case 'case_external_525_bay':
                    return $this->computerCase->external_525_bay;
                case 'case_external_350_bay':
                    return $this->computerCase->external_350_bay;
                case 'case_internal_350_bay':
                    return $this->computerCase->internal_350_bay;
                case 'case_internal_250_bay':
                    return $this->computerCase->internal_250_bay;
                default:
                    return null;
            }
        }
        return null;
    }

    public function oldMOBOFormFactorField(){
        if (strtolower($this->mode) === 'edit'){
            $mobo_form_factor_id = array();
            foreach ($this->computerCase->mobo_form_factors as $mobo_form_factor){
                $mobo_form_factor_id[] = $mobo_form_factor->id;
            }
            return $mobo_form_factor_id;
        }
        return null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.component.computer-case');
    }
}
