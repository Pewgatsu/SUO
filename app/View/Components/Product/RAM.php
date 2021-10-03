<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class RAM extends Component
{
    public $mode;
    public $ramComponents;
    public $ramComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $ramComponents = null, $ramComponentId = null)
    {
        $this->mode = $mode;
        $this->ramComponents = $ramComponents;
        $this->ramComponentId = $ramComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_ram_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_ram_products_' . $this->ramComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_ram');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.rams.edit', $this->ramComponentId);
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
        return view('components.product.ram');
    }
}
