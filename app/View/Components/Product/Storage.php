<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Storage extends Component
{
    public $mode;
    public $storageComponents;
    public $storageComponent;
    public $store;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $storageComponents = null, $storageComponent = null, $store = null)
    {
        $this->mode = $mode;
        $this->storageComponents = $storageComponents;
        $this->storageComponent = $storageComponent;
        $this->store = $store;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_storage_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_storage_products_' . $this->storageComponent->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('seller.store.add_storage');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('seller.products.storages.edit', $this->storageComponent);
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
                case 'storage_component':
                    return $this->storageComponent->name;
                case 'storage_quantity':
                    return $this->storageComponent->products->where('store_id',$this->store->id)->where('status','Available')->count();
                case 'storage_price':
                    return $this->storageComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->price ?? 0;
                case 'storage_description':
                    return $this->storageComponent->products->where('store_id',$this->store->id)->where('status','Available')->first()->description ?? '';
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
        return view('components.product.storage');
    }
}
