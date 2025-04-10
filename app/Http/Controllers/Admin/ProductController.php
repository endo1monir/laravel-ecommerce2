<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Services\Admin\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService)
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->paginate();
        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('name')->get();
        return view('admin.products.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $this->productService->store($request);
        return redirect()->route('products.index')->with('product_msg', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        $brands = Brand::select('id', 'name')->get();
        return view("admin.products.edit", get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $this->productService->update($product, $request);
        return redirect()->route('products.index')->with('product_msg', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->productImages()){
            foreach ($product->productImages as $productImage){
                File::delete($productImage->image);
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('product_msg', 'Product Deleted Successfully');
    }

    public function deleteImages(ProductImage $productImage)
    {
        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('product_msg', 'Image Deleted Successfully');
    }
}
