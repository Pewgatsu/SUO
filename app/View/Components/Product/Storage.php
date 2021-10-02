<?php

namespace App\View\Components\Product;

use Illuminate\View\Component;

class Storage extends Component
{
    public $mode;
    public $storageComponents;
    public $storageComponentId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $storageComponents = null, $storageComponentId = null)
    {
        $this->mode = $mode;
        $this->storageComponents = $storageComponents;
        $this->storageComponentId = $storageComponentId;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_storage_products';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_storage_products_' . $this->storageComponentId;
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
            return route('seller.products.storages.edit', $this->storageComponentId);
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
        return view('components.product.storage');
    }
}
