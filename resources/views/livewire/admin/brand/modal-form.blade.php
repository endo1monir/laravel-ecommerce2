<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading.delay>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden"></span>
                                    </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="storeBrand" method="POST">
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
</div>


<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading.delay>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="DestroyBrand" method="POST">
                    @csrf
                    {{--                @dump($errors)--}}
                    <div class="modal-body">
                       <h4>Are you sure you want to delete brand ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
