<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class RAM extends Component
{
    public $mode;
    public $ram;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $ram = null)
    {
        $this->mode = $mode;
        $this->ram = $ram;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_ram';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_ram_' . $this->ram->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_ram');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.rams.edit', $this->ram->component);
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

    public function oldField($string){
        if (strtolower($this->mode) === 'edit'){
            switch ($string){
                case 'ram_name':
                    return $this->ram->component->name;
                case 'ram_manufacturer':
                    return $this->ram->component->manufacturer;
                case 'ram_series':
                    return $this->ram->component->series;
                case 'ram_model':
                    return $this->ram->component->model;
                case 'ram_color':
                    return $this->ram->component->color;
                case 'ram_length':
                    return $this->ram->component->length;
                case 'ram_width':
                    return $this->ram->component->width;
                case 'ram_height':
                    return $this->ram->component->height;
                case 'ram_memory_type':
                    return $this->ram->memory_type;
                case 'ram_memory_speed':
                    return $this->ram->memory_speed;
                case 'ram_memory_capacity':
                    return $this->ram->memory_capacity;
                case 'ram_form_factor':
                    return $this->ram->memory_form_factor;
                case 'ram_modules':
                    return $this->ram->modules;
                case 'ram_voltage':
                    return $this->ram->memory_voltage;
                case 'ram_timings':
                    return $this->ram->memory_timings;
                case 'ram_ecc_memory':
                    return $this->ram->ecc;
                case 'ram_registered_memory':
                    return $this->ram->registered;
                case 'ram_heat_spreader':
                    return $this->ram->heat_spreader;
                default:
                    return null;
            }
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
        return view('components.component.ram');
    }
}
