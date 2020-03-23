<aside class="sidebar sidebar-left">
    <div class="sidebar-content">
        <nav class="main-menu">
            <ul class="nav metismenu">
                <li class="sidebar-header"><span>NAVIGATION</span></li>
                <li class="nav-dropdown">
                    <li><a href="/home"><i class="icon dripicons-home"></i><span> Inicio </span></a></li>
                </li>
                <li class="nav-dropdown">
                    <li><a href="/agenda"><i class="icon dripicons-home"></i><span> Agenda </span></a></li>
                </li>
                <li class="nav-dropdown">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-article"></i><span>Atendimento</span></a>
                    <ul class="collapse nav-sub" aria-expanded="false">
                        <li><a href="layout.blank.html"><span> Pré-atendimento </span></a></li>
                        <li><a href="layout.1-column-wide.html"><span> Avaliação </span></a></li>
                        <li><a href="layout.1-column-boxed.html"><span> Efetivação </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-header"><span>ADMINISTRADOR</span></li>
                <li class="nav-dropdown">
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="icon dripicons-to-do"></i><span>Cadastrar</span></a>
                    <ul class="collapse nav-sub" aria-expanded="false">
                        @can('permissao', 10)
                            <li><a href="/usuarios"><span> Usuarios </span></a></li>
                        @endcan
                        <li><a href="/permissoes"><span> Permissoes </span></a></li>
                    </ul>
                </li>

                <li class="sidebar-header"><span>APP VIEWS</span></li>
                <li><a href="apps.mail.html"><i class="icon dripicons-mail"></i><span>Mail</span></a></li>
                <li><a href="apps.messages.html"><i class="icon dripicons-message"></i><span>Messages</span></a></li>
                <li><a href="apps.contacts.html"><i class="icon dripicons-archive"></i><span>Contacts</span></a></li>
                <li><a href="apps.calendar.html"><i class="icon dripicons-calendar"></i><span>Calendar</span></a></li>


                <li class="sidebar-header"><span>SUPORTE</span></li>
                <li>
                    <a href="/chamados"><i class="icon dripicons-help"></i><span> Chamados </span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>