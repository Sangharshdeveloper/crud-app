<div>

    <!-- Search input for filter content on title , description -->
    <input type="text" wire:model="search" placeholder="Search Posts..." class="form-control mb-3">

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
                <td><img src="{{ $post->image }}" height="200px" width="200px" /></td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->description,200)}}</h5>
                </td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>
                    <!-- Edit Button -->
                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>

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


    <!-- Edit Modal -->
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
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
                    <textarea wire:model="description" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="update" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('show-edit-modal', event => {
        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
    });

    window.addEventListener('hide-edit-modal', event => {
        var editModal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
        if (editModal) {
            editModal.hide();
        }
    });
</script>
