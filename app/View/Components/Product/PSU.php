<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class PSU extends Component
{
    public $mode;
    public $psuComponents;
    public $psuComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $psuComponents = null, $psuComponentId = null)
    {
        $this->mode = $mode;
        $this->psuComponents = $psuComponents;
        $this->psuComponentId = $psuComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_psu_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_psu_products_' . $this->psuComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_psu');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.psus.edit', $this->psuComponentId);
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
        return view('components.product.psu');
    }
}
