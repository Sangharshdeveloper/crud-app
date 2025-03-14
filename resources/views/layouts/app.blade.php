<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Crud App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    @livewireStyles
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Crud App</a>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>


    <!-- Livewire Scripts -->
    @livewireScripts

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>

        // Sweet alert confirmation alert before delete post.
        window.addEventListener('show-delete-confirmation', event => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.Livewire.dispatch('deleteConfirmed');
                }
            });
        });

        // After post delete this sweet alert visible to user.
        window.addEventListener('postDeleted', event => {
            Swal.fire({
                title: "Deleted!",
                text: "Post has been deleted.",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });

        // After post creation this sweet alert visible to user.
        window.addEventListener('postCreated', event => {
            Swal.fire({
                title: "Added!",
                text: "Post has been added.",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });

        // After post update this sweet alert visible to user.
        window.addEventListener('postUpdated', event => {
            Swal.fire({
                title: "Update Done!",
                text: "Post has been updated.",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        });

        
    </script>

</body>

</html>