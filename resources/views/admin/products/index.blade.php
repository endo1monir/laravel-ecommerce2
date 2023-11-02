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
                            <tr>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
