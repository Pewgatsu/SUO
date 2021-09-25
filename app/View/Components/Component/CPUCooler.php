<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class CPUCooler extends Component
{
    public $cpuSockets;
    public $mode;
    public $cpuCooler;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cpuSockets, $mode, $cpuCooler = null)
    {
        $this->cpuSockets = $cpuSockets;
        $this->mode = $mode;
        $this->cpuCooler = $cpuCooler;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu_cooler';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_cooler_' . $this->cpuCooler->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_cpu_cooler');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.cpu_coolers.edit', $this->cpuCooler->component);
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

    public function setCPUSocketID(){
        if (strtolower($this->mode) === 'add'){
            return 'cpu_cooler_cpu_socket';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'cpu_cooler_cpu_socket_' . $this->cpuCooler->component->id;
        }
        else {
            return null;
        }
    }

    public function oldField($string){
        if (strtolower($this->mode) === 'edit'){
            switch ($string){
                case 'cpu_cooler_name':
                    return $this->cpuCooler->component->name;
                case 'cpu_cooler_manufacturer':
                    return $this->cpuCooler->component->manufacturer;
                case 'cpu_cooler_series':
                    return $this->cpuCooler->component->series;
                case 'cpu_cooler_model':
                    return $this->cpuCooler->component->model;
                case 'cpu_cooler_color':
                    return $this->cpuCooler->component->color;
                case 'cpu_cooler_length':
                    return $this->cpuCooler->component->length;
                case 'cpu_cooler_width':
                    return $this->cpuCooler->component->width;
                case 'cpu_cooler_height':
                    return $this->cpuCooler->component->height;
                case 'cpu_cooler_fan_speed':
                    return $this->cpuCooler->fan_speed;
                case 'cpu_cooler_noise_level':
                    return $this->cpuCooler->noise_level;
                case 'cpu_cooler_water_cooled':
                    return $this->cpuCooler->water_cooled_support;
                default:
                    return null;
            }
        }
        return null;
    }

    public function oldCPUSocketField(){
        if (strtolower($this->mode) === 'edit'){
            $cpu_socket_id = array();
            foreach ($this->cpuCooler->cpu_sockets as $cpu_socket){
                $cpu_socket_id[] = $cpu_socket->id;
            }
            return $cpu_socket_id;
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
        return view('components.component.cpu-cooler');
    }
}
