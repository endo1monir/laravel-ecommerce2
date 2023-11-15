<?php

namespace App\Services\Admin\Product;

use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Product;
use App\Models\ProductImage;

class ProductService
{
    public function store(ProductFormRequest $request)
    {
        $data = $request->validated();
        $product = Product::create([
            'category_id' => $data['category_id'],
            'name' => $data['name'],
            'slug' => \Illuminate\Support\Str::slug($data['slug']),
            'description' => $data['description'],
            'small_description' => $data['small_description'],
            'brand' => $data['brand'],
            'original_price' => $data['original_price'],
            'selling_price' => $data['selling_price'],
            'quantity' => $data['quantity'],
            'trending' => $request->has('trending') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
            'meta_title' => $data['meta_title'],
            'meta_keyword' => $data['meta_keyword'],
            'meta_description' => $data['meta_description'],
        ]);
        if ($request->hasFile('products_images')) {
            $uploadPath = 'uploads/product/';

            foreach ($request->file('products_images') as $image) {
                $extenstion = $image->getClientOriginalExtension();
                $filename = time() . '.' .$extenstion;
                $image->move($uploadPath,$filename);
                ProductImage::create([
                   'product_id' => $product->id,
                    'image' => $uploadPath.$filename
                ]);

            }
        }
    }
}
