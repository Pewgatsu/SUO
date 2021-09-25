<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class CPU extends Component
{
    public $mode;
    public $cpu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $cpu = null)
    {
        $this->mode = $mode;
        $this->cpu = $cpu;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_' . $this->cpu->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_cpu');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.cpus.edit', $this->cpu->component);
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
                case 'cpu_name':
                    return $this->cpu->component->name;
                case 'cpu_manufacturer':
                    return $this->cpu->component->manufacturer;
                case 'cpu_series':
                    return $this->cpu->component->series;
                case 'cpu_model':
                    return $this->cpu->component->model;
                case 'cpu_color':
                    return $this->cpu->component->color;
                case 'cpu_length':
                    return $this->cpu->component->length;
                case 'cpu_width':
                    return $this->cpu->component->width;
                case 'cpu_height':
                    return $this->cpu->component->height;
                case 'cpu_socket':
                    return $this->cpu->cpu_socket;
                case 'cpu_microarchitecture':
                    return $this->cpu->microarchitecture;
                case 'cpu_core_count':
                    return $this->cpu->core_count;
                case 'cpu_thread_count':
                    return $this->cpu->thread_count;
                case 'cpu_base_clock':
                    return $this->cpu->base_clock;
                case 'cpu_boost_clock':
                    return $this->cpu->boost_clock;
                case 'cpu_max_mem_support':
                    return $this->cpu->max_mem_support;
                case 'cpu_tdp':
                    return $this->cpu->tdp;
                case 'cpu_smt_support':
                    return $this->cpu->smt_support;
                case 'cpu_ecc_support':
                    return $this->cpu->ecc_support;
                case 'cpu_integrated_graphics':
                    return $this->cpu->integrated_graphics;
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
        return view('components.component.cpu');
    }
}
