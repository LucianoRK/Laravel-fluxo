@if (session('warning'))
    <script type="text/javascript">
        $(document).ready(function() {
            swal({
                position: '',
                type: 'warning',
                title:  "{{ session('warning')}}",
                showConfirmButton: false,
                timer: 1800
            })
        });
    </script>
@endif