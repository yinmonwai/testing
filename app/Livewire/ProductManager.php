<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class ProductManager extends Component
{
    public $showForm = false;
    public $editingProductId = null;

    public $name;
    public $category_id;
    public $price;

    public $products;
    public $categories;

    public function mount()
    {
        $this->loadProducts();
        $this->categories = Category::all();
    }

    public function create()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->editingProductId = $id;
        $this->name = $product->name;
        $this->category_id = $product->category_id;
        $this->price = $product->price;

        $this->showForm = true;
    }

    public function cancel()
    {
        $this->resetForm();
        $this->showForm = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
        ]);

        if ($this->editingProductId) {
            Product::find($this->editingProductId)->update([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'price' => $this->price,
            ]);

            session()->flash('message', 'Product updated successfully!');
        } else {
            Product::create([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'price' => $this->price,
            ]);

            session()->flash('message', 'Product created successfully!');
        }

        $this->resetForm();
        $this->showForm = false;
        $this->loadProducts();
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('message', 'Product deleted successfully!');
        $this->loadProducts();
    }

    private function resetForm()
    {
        $this->editingProductId = null;
        $this->name = '';
        $this->category_id = '';
        $this->price = '';
    }

    private function loadProducts()
    {
        $this->products = Product::with('category')->get();
    }

    public function render()
    {
        return view('livewire.product-manager');
    }
}
