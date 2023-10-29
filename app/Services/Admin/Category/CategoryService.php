<?php

namespace App\Services\Admin\Category;

use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Psy\Util\Str;

class CategoryService
{
    public function store(CategoryFormRequest $request)
    {

        $data = $request->validated();
//        dd($data);
        $category = Category::create(
            [
                'name' => $data['name'],
                'slug' => \Illuminate\Support\Str::slug($data['slug']),
                'description' => $data['description'],
                'status' => !$request->has('status') ? 0 : 1,
                'meta_title' => $data['meta_title'],
                'meta_keyword' => $data['meta_keyword'],
                'meta_description' => $data['meta_description'],
            ]
        );
        if (!$request->has('status')) {
            $category->status = 0;
            $category->save();
        }
        if ($request->hasFile('image')) {
            $category->image = $this->getCategoryImageName($request->file('image'));
            $category->save();
        }
//        return redirect()->route('category')->with('msg', 'Category created successfully');
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        // if status is not set, set it to 0
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $path = 'uploads/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $category->image = $this->getCategoryImageName($request->file('image'));
            $category->save();
        }
        $category->update([
            'name' => $data['name'],
            'slug' => \Illuminate\Support\Str::slug($data['slug']),
            'description' => $data['description'],
            'status'=> !$request->has('status') ? 0 : 1,
            'meta_title' => $data['meta_title'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
        ]);


    }


    protected function getCategoryImageName($file): string
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move('uploads/category', $fileName);
        return $fileName;
    }
}
