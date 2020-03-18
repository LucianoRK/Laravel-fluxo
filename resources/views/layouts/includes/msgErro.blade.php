@if (session('warning'))
    <script type="text/javascript">
        $(document).ready(function() {
            swal({
                position: '',
                type: 'error',
                title:  "{{ session('warning')}}",
                showConfirmButton: false,
                timer: 1400
            })
        });
    </script>
@endif