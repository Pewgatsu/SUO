<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Motherboard extends Component
{
    public $mode;
    public $motherboardComponents;
    public $motherboardComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $motherboardComponents = null, $motherboardComponentId = null)
    {
        $this->mode = $mode;
        $this->motherboardComponents = $motherboardComponents;
        $this->motherboardComponentId = $motherboardComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_motherboard_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_motherboard_products_' . $this->motherboardComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_motherboard');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.motherboards.edit', $this->motherboardComponentId);
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
        return view('components.product.motherboard');
    }
}
