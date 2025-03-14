<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Axis Insurance Broker')</title>
    <link rel="shortcut icon" href="https://axisinsurance.ae/assets/media/logos/favicon.ico" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">



</head>

<body>

    {{$slot}}



    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Create Post modal
            window.addEventListener('show-create-modal', function() {
                $('#createModal').modal('show');
            });

            // Create Post modal
            window.addEventListener('hide-create-modal', function() {
                $('#createModal').modal('hide');
            });

            // Show view modal
            window.addEventListener('show-view-modal', function() {
                $('#viewModal').modal('show');
            });

            // Hide view modal
            window.addEventListener('hide-view-modal', function() {
                $('#viewModal').modal('hide');
            });

            // Show edit modal
            window.addEventListener('show-edit-modal', function() {
                $('#editModal').modal('show');
            });

            // Hide edit modal
            window.addEventListener('hide-edit-modal', function() {
                $('#editModal').modal('hide');
            });

            // close button code 
            $('.modal .close, .modal .btn-secondary').click(function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    </script>


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