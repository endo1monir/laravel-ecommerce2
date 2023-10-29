<div class="row">
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin">
        @if(session('msg'))
            <div class="alert alert-success"> {{session('msg')}} </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Category
                    <a href="{{route('category.create')}}" class="btn btn-primary float-end text-white">Add
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
@push('scripts')
    <script>
        Livewire.on('category_deleted', function () {
            $('#deleteModal').modal('hide');
        });
    </script>
@endpush
