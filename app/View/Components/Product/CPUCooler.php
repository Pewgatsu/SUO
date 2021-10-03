<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class CPUCooler extends Component
{
    public $mode;
    public $cpuCoolerComponents;
    public $cpuCoolerComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $cpuCoolerComponents = null, $cpuCoolerComponentId = null)
    {
        $this->mode = $mode;
        $this->cpuCoolerComponents = $cpuCoolerComponents;
        $this->cpuCoolerComponentId = $cpuCoolerComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu_cooler_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_cooler_products_' . $this->cpuCoolerComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_cpu_cooler');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.cpu_coolers.edit', $this->cpuCoolerComponentId);
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.cpu-cooler');
    }
}
