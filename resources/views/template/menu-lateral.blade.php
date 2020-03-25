<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/AdminLTELogo.png"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SisDenys</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Usuário</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="/  " class="nav-link">
                        <i class="fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chamados')}}" class="nav-link">
                        <i class="fas fa-phone-volume"></i>
                        <p>
                            Chamados usuário
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('atendente.chamados')}}" class="nav-link">
                        <i class="fas fa-phone-volume"></i>
                        <p>
                            Chamados atendente
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chamados')}}" class="nav-link">
                        <i class="fas fa-phone-volume"></i>
                        <p>
                            Chamados Admin
                        </p>
                    </a>
                </li>
                <li class="nav-header">Gerencial</li>
                <li class="nav-item">
                    <a href="{{route('unidades')}}" class="nav-link">
                        <i class="fas fa-building"></i>
                        <p>
                            Unidades
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tipoChamado')}}" class="nav-link">
                        <i class="fas fa-tty"></i>
                        <p>
                            Tipos de chamados
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chamados')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Gerenciar de Usuários
                        </p>
                    </a>
                </li>
                <li class="nav-header">Minha Conta</li>
                <li class="nav-item">
                    <a href="{{route('chamados')}}" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Meu usuário
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('chamados')}}" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Sair
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
