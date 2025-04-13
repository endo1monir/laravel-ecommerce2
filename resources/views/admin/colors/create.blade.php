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
                    <h4>Add Color
                        <a href="{{route('colors.index')}}" class="btn btn-primary float-end text-white">
                            Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('colors.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Color Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Color Code</label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Status</label><br>
                            <input type="checkbox" name="status"> checked=hidden , unchecked=visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>

@endsection
