<div class="container-sm mt-5">
    <div>
        <div class="row mb-3">
            <div class="col-md-10">
                <img src="https://axisinsurance.ae/assets/axis/images/logo.png" height="90" alt="">
            </div>
            <div class="col-md-2 text-end">
                <button wire:click="create()" class="btn btn-success btn-sm"> + Create Post</button>
            </div>
        </div>

        <table class="table table-striped" id="posts-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><img src="{{ $post->image }}" height="220px" width="220px" class="img-thumbnail" /></td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <div>
                            {!! Str::limit(nl2br(strip_tags($post->description)), 200) !!}
                        </div>
                    </td>
                    <td>
                        <div class="responsive-text-a">{{$post->created_at->format('Y-m-d')}}</div>
                    </td>
                    <td>
                        <!-- View Button -->
                        <button wire:click="view({{ $post->id }})" class="btn btn-primary btn-sm">View</button>
                        <br>
                        <br>

                        <!-- Edit Button -->
                        <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <br>
                        <br>

                        <!-- Delete Button -->
                        <button wire:click="confirmDelete({{ $post->id }})" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- This added for pagination. user can change pages from here -->
        {{ $posts->links('pagination::bootstrap-5') }}

        <!-- Create Post Modal -->
        <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" wire:model="title" class="form-control mb-2" placeholder="Title">
                        <input type="text" wire:model="image" class="form-control mb-2" placeholder="Image">
                        <textarea wire:model="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="open = false" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="storePost" class="btn btn-success">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" wire:model="title" class="form-control mb-2" placeholder="Title">
                        <input type="text" wire:model="image" class="form-control mb-2" placeholder="Image">
                        <textarea wire:model="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="open = false" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button wire:click="update" class="btn btn-success">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <div wire:ignore.self class="modal fade fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-gray-700">{!! nl2br(e($title)) !!}</h4>
                        <img src="{!! nl2br(e($image)) !!}" alt="" height="200px">
                        <p class="text-gray-700">{!! nl2br(e($description)) !!}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
