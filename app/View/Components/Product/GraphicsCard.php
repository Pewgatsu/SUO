<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class GraphicsCard extends Component
{
    public $mode;
    public $graphicsCardComponents;
    public $graphicsCardComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $graphicsCardComponents = null, $graphicsCardComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->graphicsCardComponents = $graphicsCardComponents;
        $this->graphicsCardComponent = $graphicsCardComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_graphics_card_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_graphics_card_products_' . $this->graphicsCardComponent->id;
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
            return route('seller.products.graphics_cards.edit', $this->graphicsCardComponent);
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
                case 'graphics_card_component':
                    return $this->graphicsCardComponent->name;
                case 'graphics_card_quantity':
                    return $this->graphicsCardComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'graphics_card_price':
                    return $this->graphicsCardComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'graphics_card_description':
                    return $this->graphicsCardComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.graphics-card');
    }
}
