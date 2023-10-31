@extends('layouts.admin')
@section('content')

    <div class="row">

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
                            <td>Name</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->status ? 'visible':'hidden' }}</td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-success text-white">Edit</a>
                                    <a wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal"
                                       data-bs-target="#deleteModal" href="#"
                                       class="btn btn-danger text-white">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>


@endsection
