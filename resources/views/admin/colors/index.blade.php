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
                    <h4>Colors list
                        <a href="{{route('colors.create')}}" class="btn btn-primary float-end text-white">Add
                            Color</a>
                    </h4>
                </div>
                <div class="card-body">

                </div>
            </div>

@endsection
