<?php

namespace App\Services\Admin\Category;

use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;

class CategoryService
{
    public function store(CategoryFormRequest $request)
    {

        $data = $request->validated();
//        dd($data);
        $category = Category::create(
            [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'description' => $data['description'],
                'status' => $data['status'] ? 1 : 0,
                'meta_title' => $data['meta_title'],
                'meta_keyword' => $data['meta_keyword'],
                'meta_description' => $data['meta_description'],
            ]
        );
        if ($request->hasFile('image')) {
            $category->image = $this->getCategoryImageName($request->file('image'));
            $category->save();
        }

    }

    protected function getCategoryImageName($file): string
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move('uploads/category', $fileName);
        return $fileName;
    }
}
