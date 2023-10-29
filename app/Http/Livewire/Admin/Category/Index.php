<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::findOrFail($this->category_id);

        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        session()->flash('msg', 'Category Deleted Successfully');
        $this->emit('category_deleted');
    }

    public function render()
    {
        $categories = Category::select('id', 'name', 'status')->orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
