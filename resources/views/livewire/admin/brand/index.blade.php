<div>
    @include('livewire.admin.brand.modal-form')
    <div wire:ignore.self class="modal fade" id="EditBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Brand List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateBrand" method="POST">
                    @csrf
                    {{--                @dump($errors)--}}
                    <div class="modal-body">
                        <div class="mt-3">
                            <label>name</label>
                            <input type="text" wire:model.defer="name"  name="name" class="form-control">
                            @error('name')
                            <small class="text-danger"> {{$message}}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label>slug</label>
                            <input type="text" wire:model.defer="slug" name="slug" class="form-control">
                            @error('slug')
                            <small class="text-danger"> {{$message}} </small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label>status</label>
                            <input type="checkbox" wire:model.defer="status"  name="status"> check=visible,uncheck=hidden
                            @error('status')
                            <small class="text-danger"> {{$message}} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @if(session('brand-msg'))
            <div class="alert alert-success"> {{session('brand-msg')}} </div>
        @endif
        <div></div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4> Brands List
                        <a href="#" data-bs-target="#addBrandModal" data-bs-toggle="modal"
                           class="btn btn-primary text-white float-end">Add Brand </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>

                        <tr>
                            <th> ID</th>
                            <th> Name</th>
                            <th> Slug</th>
                            <th> Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>{{$brand->status ? 'visible' : 'hidden' }}</td>
                                <td>
                                <td>
                                    <a href="#" wire:click="EditBrand({{$brand->id}})" data-bs-target="#EditBrandModal" data-bs-toggle="modal" class="btn btn-success text-white">Edit</a>
                                    <a class="btn btn-danger text-white">Delete</a>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                <div>
                    {{$brands->links()}}
                </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>

        Livewire.on('closeModal', function () {
            $('#addBrandModal').modal('hide');
            $('#EditBrandModal').modal('hide');
        })
    </script>
@endpush
