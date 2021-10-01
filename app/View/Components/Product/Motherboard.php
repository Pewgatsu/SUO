<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Motherboard extends Component
{
    public $mode;
    public $motherboards;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $motherboards)
    {
        $this->mode = $mode;
        $this->motherboards = $motherboards;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_motherboard_product';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_motherboard_product';
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.products.motherboards.add');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.motherboards.edit');
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
