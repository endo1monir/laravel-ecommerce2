<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use App\Services\Admin\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {

    }

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('category')->with('msg', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, Category $category)
    {

        $this->categoryService->update($request, $category);
        return redirect()->route('category')->with('msg', 'Category Updated Successfully');
    }

    public function delete(Category $category)
    {
//        return view('admin.category.edit' , compact('category'));
    }
}
