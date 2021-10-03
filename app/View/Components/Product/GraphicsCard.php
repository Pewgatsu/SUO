<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class GraphicsCard extends Component
{
    public $mode;
    public $graphicsCardComponents;
    public $graphicsCardComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $graphicsCardComponents = null, $graphicsCardComponentId = null)
    {
        $this->mode = $mode;
        $this->graphicsCardComponents = $graphicsCardComponents;
        $this->graphicsCardComponentId = $graphicsCardComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_graphics_card_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_graphics_card_products_' . $this->graphicsCardComponentId;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_graphics_card');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.graphics_cards.edit', $this->graphicsCardComponentId);
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
        return view('components.product.graphics-card');
    }
}
