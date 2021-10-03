<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class PSU extends Component
{
    public $mode;
    public $psuComponents;
    public $psuComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $psuComponents = null, $psuComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->psuComponents = $psuComponents;
        $this->psuComponent = $psuComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_psu_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_psu_products_' . $this->psuComponent->id;
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
            return route('seller.products.psus.edit', $this->psuComponent);
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
                case 'psu_component':
                    return $this->psuComponent->name;
                case 'psu_quantity':
                    return $this->psuComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'psu_price':
                    return $this->psuComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'psu_description':
                    return $this->psuComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.psu');
    }
}
