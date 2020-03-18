@if (session('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            swal({
                position: '',
                type: 'success',
                title:  "{{ session('success')}}",
                showConfirmButton: false,
                timer: 1400
            })
        });
    </script>
@endif