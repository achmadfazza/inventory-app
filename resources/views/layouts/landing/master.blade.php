<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon" />
    @vite('resources/css/app.css')
</head>

<body style="font-family: 'Oswald', sans-serif;">
    @include('layouts.landing.partials.navbar')
    <div class="mb-20">
        @yield('content')
        @include('sweetalert::alert')
    </div>
    @include('layouts.landing.partials.footer')

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function deleteData(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Kamu yakin ingin mengeluarkan item ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, tolong keluarkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Data tidak dihapus',
                        '',
                        'error'
                    )
                }
            })
        }
    </script>
</body>

</html>


<script>
    // Disable right-click
    document.addEventListener('contextmenu', (e) => e.preventDefault());

    function ctrlShiftKey(e, keyCode) {
        return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
    }

    document.onkeydown = (e) => {
        // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
        if (
            event.keyCode === 123 ||
            ctrlShiftKey(e, 'I') ||
            ctrlShiftKey(e, 'J') ||
            // ctrlShiftKey(e, 'C') ||
            (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
        )
            return false;
    };
</script>
