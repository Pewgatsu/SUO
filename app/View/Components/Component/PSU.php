<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class PSU extends Component
{
    public $mode;
    public $psu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $psu = null)
    {
        $this->mode = $mode;
        $this->psu = $psu;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_psu';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_psu_' . $this->psu->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_psu');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.psus.edit', $this->psu->component);
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
                case 'psu_name':
                    return $this->psu->component->name;
                case 'psu_manufacturer':
                    return $this->psu->component->manufacturer;
                case 'psu_series':
                    return $this->psu->component->series;
                case 'psu_model':
                    return $this->psu->component->model;
                case 'psu_color':
                    return $this->psu->component->color;
                case 'psu_length':
                    return $this->psu->component->length;
                case 'psu_width':
                    return $this->psu->component->width;
                case 'psu_height':
                    return $this->psu->component->height;
                case 'psu_form_factor':
                    return $this->psu->psu_form_factor;
                case 'psu_wattage':
                    return $this->psu->wattage;
                case 'psu_efficiency_rating':
                    return $this->psu->efficiency_rating;
                case 'psu_modular':
                    return $this->psu->modular;
                case 'psu_atx_connector':
                    return $this->psu->atx_connector;
                case 'psu_eps_connector':
                    return $this->psu->eps_connector;
                case 'psu_sata_connector':
                    return $this->psu->sata_connector;
                case 'psu_molex_connector':
                    return $this->psu->molex_4pin_connector;
                case 'psu_pcie_8pin_connector':
                    return $this->psu->pcie_8pin_connector;
                case 'psu_pcie_62pin_connector':
                    return $this->psu->{'pcie_6+2pin_connector'};
                case 'psu_pcie_6pin_connector':
                    return $this->psu->pcie_6pin_connector;
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
        return view('components.component.psu');
    }
}
