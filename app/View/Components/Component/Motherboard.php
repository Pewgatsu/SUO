<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class Motherboard extends Component
{
    public $memorySpeeds;
    public $mode;
    public $motherboard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($memorySpeeds, $mode, $motherboard = null)
    {
        $this->memorySpeeds = $memorySpeeds;
        $this->mode = $mode;
        $this->motherboard = $motherboard;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_motherboard';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_motherboard_' . $this->motherboard->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_motherboard');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.motherboards.edit', $this->motherboard->component);
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

    public function setMemorySpeedID(){
        if (strtolower($this->mode) === 'add'){
            return 'mobo_mem_speed_support';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'mobo_mem_speed_support_' . $this->motherboard->component->id;
        }
        else {
            return null;
        }
    }

    public function oldField($string){
        if (strtolower($this->mode) === 'edit'){
            switch ($string){
                case 'mobo_name':
                    return $this->motherboard->component->name;
                case 'mobo_manufacturer':
                    return $this->motherboard->component->manufacturer;
                case 'mobo_series':
                    return $this->motherboard->component->series;
                case 'mobo_model':
                    return $this->motherboard->component->model;
                case 'mobo_color':
                    return $this->motherboard->component->color;
                case 'mobo_length':
                    return $this->motherboard->component->length;
                case 'mobo_width':
                    return $this->motherboard->component->width;
                case 'mobo_height':
                    return $this->motherboard->component->height;
                case 'mobo_cpu_socket':
                    return $this->motherboard->cpu_socket;
                case 'mobo_form_factor':
                    return $this->motherboard->mobo_form_factor;
                case 'mobo_chipset':
                    return $this->motherboard->mobo_chipset;
                case 'mobo_memory_slot':
                    return $this->motherboard->memory_slot;
                case 'mobo_memory_type':
                    return $this->motherboard->memory_type;
                case 'mobo_max_mem_support':
                    return $this->motherboard->max_mem_support;
                case 'mobo_pcie_x16_slot':
                    return $this->motherboard->pcie_x16_slot;
                case 'mobo_pcie_x8_slot':
                    return $this->motherboard->pcie_x8_slot;
                case 'mobo_pcie_x4_slot':
                    return $this->motherboard->pcie_x4_slot;
                case 'mobo_pcie_x1_slot':
                    return $this->motherboard->pcie_x1_slot;
                case 'mobo_pci_slot':
                    return $this->motherboard->pci_slot;
                case 'mobo_m2_slot':
                    return $this->motherboard->m2_slot;
                case 'mobo_sata_6gb_slot':
                    return $this->motherboard->sata_6gb_slot;
                case 'mobo_sata_3gb_slot':
                    return $this->motherboard->sata_3gb_slot;
                case 'mobo_multigraphics_support':
                    return $this->motherboard->multigraphics_support;
                case 'mobo_ecc_support':
                    return $this->motherboard->ecc_support;
                case 'mobo_raid_support':
                    return $this->motherboard->raid_support;
                case 'mobo_wireless_support':
                    return $this->motherboard->wireless_support;
                default:
                    return null;
            }
        }
        return null;
    }

    public function oldMemorySpeedField(){
        if (strtolower($this->mode) === 'edit'){
            $memory_speed_id = array();
            foreach ($this->motherboard->memory_speeds as $memory_speed){
                $memory_speed_id[] = $memory_speed->id;
            }
            return $memory_speed_id;
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
        return view('components.component.motherboard');
    }
}
