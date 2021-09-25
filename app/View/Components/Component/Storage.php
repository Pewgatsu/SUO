<?php

namespace App\View\Components\Component;

use Illuminate\View\Component;

class Storage extends Component
{
    public $mode;
    public $storage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($mode, $storage = null)
    {
        $this->mode = $mode;
        $this->storage = $storage;
    }

    public function setID(){
        if (strtolower($this->mode) === 'add'){
            return 'add_storage';
        }
        elseif (strtolower($this->mode) === 'edit'){
            return 'edit_storage_' . $this->storage->component->id;
        }
        else {
            return null;
        }
    }

    public function setRoute(){
        if (strtolower($this->mode) === 'add'){
            return route('admin.dashboard.add_storage');
        }
        elseif (strtolower($this->mode) === 'edit'){
            return route('admin.components.storages.edit', $this->storage->component);
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
                case 'storage_name':
                    return $this->storage->component->name;
                case 'storage_manufacturer':
                    return $this->storage->component->manufacturer;
                case 'storage_series':
                    return $this->storage->component->series;
                case 'storage_model':
                    return $this->storage->component->model;
                case 'storage_color':
                    return $this->storage->component->color;
                case 'storage_length':
                    return $this->storage->component->length;
                case 'storage_width':
                    return $this->storage->component->width;
                case 'storage_height':
                    return $this->storage->component->height;
                case 'storage_type':
                    return $this->storage->storage_type;
                case 'storage_capacity':
                    return $this->storage->storage_capacity;
                case 'storage_interface':
                    return $this->storage->interface;
                case 'storage_form_factor':
                    return $this->storage->storage_form_factor;
                case 'storage_cache':
                    return $this->storage->storage_cache;
                case 'storage_nvme':
                    return $this->storage->nvme;
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
        return view('components.component.storage');
    }
}
