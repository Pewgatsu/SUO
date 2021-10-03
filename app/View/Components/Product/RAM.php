<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class RAM extends Component
{
    public $mode;
    public $ramComponents;
    public $ramComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $ramComponents = null, $ramComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->ramComponents = $ramComponents;
        $this->ramComponent = $ramComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_ram_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_ram_products_' . $this->ramComponent->id;
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
            return route('seller.products.rams.edit', $this->ramComponent);
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
                case 'ram_component':
                    return $this->ramComponent->name;
                case 'ram_quantity':
                    return $this->ramComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'ram_price':
                    return $this->ramComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'ram_description':
                    return $this->ramComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.ram');
    }
}
