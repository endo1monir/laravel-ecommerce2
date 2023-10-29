@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>Category
                        <a href="{{route('category')}}" class="btn btn-primary float-end text-white">back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" value="{{$category->name}}" name="name" class="form-control" />
                                @error('name')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>slug</label>
                                <input type="text" name="slug" value="{{$category->slug}}" class="form-control" />
                                @error('slug')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>description</label>
                                <textarea  name="description" rows="3" class="form-control" >{{$category->description}}</textarea>
                                @error('description')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> Image </label>
                                <input type="file" name="image" class="form-control" />
                                <img src="{{asset('/uploads/category/'.$category->image)}}" width="60px" height="60px">
                                @error('image')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> Status </label>
                                <input type="checkbox" name="status" {{$category->status ? 'checked' :''}}  />
                                @error('status')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> meta title </label>
                                <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}" />

                                @error('meta_title')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror </div>
                            <div class="col-md-6 mb-3">
                                <label> meta keyword </label>
                                <textarea  name="meta_keyword" class="form-control" rows="3" >{{$category->meta_keyword}}</textarea>
                                @error('meta_keyword')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label> meta description </label>
                                <textarea  name="meta_description" class="form-control" rows="3" >{{$category->meta_description}}</textarea>
                                @error('meta_description')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div><div class="col-md-12 mb-3">

                                <button type="submit" class="btn btn-primary float-end" >Save</button>
                            </div>
                        </div>

                    </form>
                    {{--                    @dd($errors)--}}
                </div>
            </div>
        </div>
    </div>
@endsection
