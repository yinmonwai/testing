<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;


class CategoryManager extends Component
{
    public $categories;
    public $name;
    public $categoryId;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|min:2|max:255',
    ];

    public function render()
    {
        $this->categories = Category::orderBy('id', 'desc')->get();
        return view('livewire.category-manager');
    }

    // Open modal for create
    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    // Open modal for edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->showModal = true;
    }

    // Save category (create or update)
    public function save()
    {
        $this->validate();

        if ($this->categoryId) {
            // Update
            $category = Category::findOrFail($this->categoryId);
            $category->update([
                'name' => $this->name,
            ]);
            session()->flash('message', 'Category updated successfully.');
        } else {
            // Create
            Category::create([
                'name' => $this->name,
            ]);
            session()->flash('message', 'Category created successfully.');
        }

        $this->resetForm();
        $this->showModal = false;
    }

    // Delete category
    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        session()->flash('message', 'Category deleted successfully.');
    }

    // Close modal and reset
    public function cancel()
    {
        $this->resetForm();
        $this->showModal = false;
    }

    // Reset form fields
    private function resetForm()
    {
        $this->name = '';
        $this->categoryId = null;
    }
}
