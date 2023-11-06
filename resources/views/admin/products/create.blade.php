@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product
                        <a href="{{route('products.index')}}" class="btn btn-primary float-end text-white">back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane"
                                    type="button" role="tab" aria-controls="seo-tab-pane" aria-selected="false">SEO
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="images-tab" data-bs-toggle="tab"
                                    data-bs-target="#images-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">Images
                            </button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                             aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3"><label class="mt-3 mb-2">Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"> {{$category->name}} </option>
                                    @endforeach
                                </select></div>
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input name="name" class="form-control" rows="4" />
                            </div>
                            <div class="mb-3">
                                <label>Product Slug</label>
                                <input name="slug" class="form-control" rows="4" />
                            </div>
                            <div>
                                <label>Brand</label>
                            <select name="brand" class="form-control mb-3 mt-3" >
                                @foreach($brands as $brand)
                                <option value="{{$brand->name}}"> {{$brand->name}} </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="mb-3">
                                <label>Small Description 500 words</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab"
                             tabindex="0">
                            <div class="mb-3">
                                <label>meta title</label>
                                <textarea name="meta_title" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>meta keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label>meta description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                             tabindex="0">
                            <div class="mb-3">
                                <label>original price</label>
                                <input type="text" name="original_price" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>selling price</label>
                                <input type="text" name="selling_price" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <label>Trending</label>
                                <input type="checkbox" name="trending" />
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" />
                            </div>
                        </div>
                        <div class="tab-pane fade" id="images-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                             tabindex="0">
                            <div class="mb-3  mt-3">
                                <label class="mb-2">Images</label>
                                <input type="file" multiple name="products_images" class="form-control"/>
                            </div>

                        </div>

                    </div>
                    <div>
                        <button type="submit" class="btn text-white btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
