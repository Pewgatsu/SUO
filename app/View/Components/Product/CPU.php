<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class CPU extends Component
{
    public $mode;
    public $cpuComponents;
    public $cpuComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $cpuComponents = null, $cpuComponentId = null)
    {
        $this->mode = $mode;
        $this->cpuComponents = $cpuComponents;
        $this->cpuComponentId = $cpuComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_cpu_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_cpu_products_' . $this->cpuComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_cpu');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.cpus.edit', $this->cpuComponentId);
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
        return view('components.product.cpu');
    }
}
