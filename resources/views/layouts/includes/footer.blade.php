<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<script src="{{asset('assets/vendor/modernizr/modernizr.custom.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/js-storage/js.storage.js')}}"></script>
<script src="{{asset('assets/vendor/pace/pace.js')}}"></script>
<script src="{{asset('assets/vendor/metismenu/dist/metisMenu.js')}}"></script>
<script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- ================ PAGE LEVEL VENDOR SCRIPTS ==================-->
<script src="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.min.js')}}"> </script>
<script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-daterangepicker/moment.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

<!-- ================== GLOBAL APP SCRIPTS ==================-->
<script src="{{asset('assets/js/global/app.js')}}"></script>

<!-- ================== MASK ==================-->
<script src="{{asset('assets/vendor/jquery-mask/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/js/components/jquery-mask-init.js')}}"></script>

<script>    
    $(document).ready(function() { 
        myMasks();
        selectComPesquisar();
    });
</script>