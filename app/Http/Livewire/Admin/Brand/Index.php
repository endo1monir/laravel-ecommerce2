<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;
    public $slug;
    public $status;
    public $brand;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required',
        'slug' => 'required|string',
        'status' => 'nullable|boolean',
    ];

    public function storeBrand()
    {
        $data = $this->validate();
        Brand::create(
            [
                'name' => $data['name'],
                'slug' => Str::slug($data['slug']),
                'status' => $data['status'] ? 1 : 0
            ]
        );
        $this->reset();
        session()->flash('brand-msg', 'brand added successfully');
        $this->emit('closeModal');
    }

    public function EditBrand(Brand $brand)
    {
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->brand = $brand;
    }

    public function updateBrand()
    {
        $data = $this->validate();
        $this->brand->update(
            [
                'name' => $data['name'],
                'slug' => Str::slug($data['slug']),
                'status' => $data['status'] ? 1 : 0
            ]
        );
        $this->reset();
        sleep(1);
        session()->flash('brand-msg', 'brand updated successfully');
        $this->emit('closeModal');

    }

    public function deleteBrand(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function DestroyBrand()
    {
        $this->brand->delete();
        sleep(1);
        session()->flash('brand-msg', 'brand deleted successfully');
        $this->emit('closeModal');
    }

    public function render()
    {
        $brands = Brand::paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('layouts.admin')->section('content');
    }
}
