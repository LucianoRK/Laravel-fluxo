<div class="navbar-nav nav-right">
    <!-- START SEARCH -->
    <div class="card-body">
        <div class="btn-group dropdown">
            <div class="input-group">
                <input type="text" class="form-control" name="nome_cliente" id="nome_cliente" placeholder="Buscar cliente">
                <div class="input-group-append">
                    <a href="#" class="input-group-text btn_buscar_cliente" data-toggle="dropdown">
                        <i class="zmdi zmdi-search"></i>
                    </a>
                    <div class="dropdown-menu drop-select-agenda lista_clintes" x-placement="bottom-start"></div> 
                </div>
            </div>
        </div>
    </div>
    <!-- END SEARCH -->
</div>

<script>
    function buscarCliente(){
        $('.btn_buscar_cliente').on('click', function(){
            $(".lista_clintes").css("width","100%");
            let nome     = $("#nome_cliente").val();

            $(".lista_clintes").load("../../listaClientesFiltradoNavbar",{
                _token: "{{ csrf_token() }}",
                nome: nome, 
            }, function(clientes){

            });  
        })
    }

    $(document).ready(function() {
        buscarCliente();
    });
</script>