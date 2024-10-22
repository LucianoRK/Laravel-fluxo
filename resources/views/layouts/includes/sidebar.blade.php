<aside class="sidebar sidebar-left">
    <div class="sidebar-content">
        <nav class="main-menu">
            <ul class="nav metismenu">

                <li class="sidebar-header"><span>NAVEGAÇÃO</span></li>
                <li class="nav-dropdown">
                    <li><a href="/home"><i class="icon dripicons-home"></i><span> Inicio </span></a></li>
                </li>
                <li class="nav-dropdown">
                    <li><a href="/agenda"><i class="icon dripicons-calendar"></i><span> Agenda </span></a></li>
                </li>

                <li class="sidebar-header"><span>CONFIGURAÇÕES</span></li>
                @can('permissao', 10)
                    <li class="nav-dropdown">
                        <li><a href="/usuarios"><i class="icon dripicons-user-id"></i><span> Usuarios </span></a></li>
                    </li>
                @endcan
                @can('permissao', 11)
                    <li class="nav-dropdown">
                        <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-to-do"></i><span>Procedimentos</span></a>
                        <ul class="collapse nav-sub" aria-expanded="false">
                            <li><a href="/procedimentosCategorias"><span> Categorias </span></a></li>
                            <li><a href="/procedimentos"><span> Procedimentos </span></a></li>
                        </ul>
                    </li>
                @endcan
                @can('permissao', 12)
                    <li class="nav-dropdown">
                        <li><a href="/proteticos"><i class="icon dripicons-user-id"></i><span> Protéticos </span></a></li>
                    </li>
                @endcan
                @can('permissao', 13)
                    <li class="nav-dropdown">
                        <li><a href="/radiologistas"><i class="icon dripicons-user-id"></i><span> Radiologistas </span></a></li>
                    </li>
                @endcan
                @can('permissao', 14)
                <li class="nav-dropdown">
                    <li><a href="/feriados"><i class="icon dripicons-calendar"></i><span> Feriados </span></a></li>
                </li>
                @endcan

                <li class="nav-dropdown">
                    <li><a href="/permissoes"><i class="icon dripicons-lock"></i><span> Gerenciar Permissões </span></a></li>
                </li>

                <li class="sidebar-header"><span>SUPORTE</span></li>
                <li>
                    <a href="/chamados"><i class="icon dripicons-help"></i><span> Chamados </span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>