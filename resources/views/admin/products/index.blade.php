@extends('layouts.admin')
@section('content')

    <div class="row">
        @if(session('product_msg'))
            <div class="alert alert-success"> {{session('product_msg')}} </div>
        @endif
        <div class="col-md-12 grid-margin">
            @if(session('msg'))
                <div class="alert alert-success"> {{session('msg')}} </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="{{route('products.create')}}" class="btn btn-primary float-end text-white">Add
                            Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Category</td>
                            <td>Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status? 'active':'hidden' }}</td>
                                <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-success"> Edit </a>
                                    <a href="" class="btn btn-danger"> Delete </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7"> No Products Avalible</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                </div>
                <div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
