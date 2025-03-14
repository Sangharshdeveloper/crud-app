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
            </tr>
        </thead>
        <tbody>
            
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><img src="{{ $post->image }}" height="200px" width="200px"/></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->description, 50) }}</td>
                    <td>{{ $post->created_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
     <!-- This added for pagination. user can change pages from here -->
    {{ $posts->links('pagination::bootstrap-5') }}
    </div>
