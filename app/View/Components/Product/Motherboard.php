<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Motherboard extends Component
{
    public $mode;
    public $motherboardComponents;
    public $motherboardComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $motherboardComponents = null, $motherboardComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->motherboardComponents = $motherboardComponents;
        $this->motherboardComponent = $motherboardComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_motherboard_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_motherboard_products_' . $this->motherboardComponent->id;
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
            return route('seller.products.motherboards.edit', $this->motherboardComponent);
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
                case 'mobo_component':
                    return $this->motherboardComponent->name;
                case 'mobo_quantity':
                    return $this->motherboardComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'mobo_price':
                    return $this->motherboardComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'mobo_description':
                    return $this->motherboardComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.motherboard');
    }
}
