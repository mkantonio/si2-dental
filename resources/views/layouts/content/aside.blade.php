<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            @can('Administracion_y_Seguridad')
                <li class="desactive treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Administracion y Seguridad</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a></li>
                        <li class="{{ (request()->is('users')) ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Usuarios</a></li>
                        <li class="{{ (request()->is('roles')) ? 'active' : '' }}"><a href="{{ route('roles.index') }}"><i class="fa fa-briefcase"></i>Cargos</a></li>
                        <li class="{{ (request()->is('permissions')) ? 'active' : '' }}"><a href="{{ route('permissions.index') }}"><i class="fa fa-briefcase"></i>Privilegios</a></li>
                        <li class="{{ (request()->is('bitacoras')) ? 'active' : '' }}"><a href="{{ route('bitacoras.index') }}"><i class="fa fa-cogs  "></i> Bitacora</a></li>
                    </ul>
                </li>
            @endcan
            @can('Atencion_al_Paciente')
                <li class="desactive treeview">
                    <a href="#">
                        <i class="fa fa-street-view"></i> <span>Atencion al Paciente</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (request()->is('pacientes')) ? 'active' : '' }}" ><a href="{{ route('pacientes.index') }}"><i class="fa fa-circle-o"></i> Gestionar Paciente</a></li>
                        <li class="{{ (request()->is('citas')) ? 'active' : '' }}" ><a href="{{ route('citas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Citas</a></li>
                        <li class="{{ (request()->is('servicios')) ? 'active' : '' }}" ><a href="{{ route('servicios.index') }}"><i class="fa fa-circle-o"></i> Gestionar servicios</a></li>
                        <li class="{{ (request()->is('agendas')) ? 'active' : '' }}" ><a href="{{ route('agendas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Agenda</a></li>



                    </ul>
                </li>

            @endcan
            @can('Pagos')
                <li class="desactive treeview">
                    <a href="#">
                        <i class="fa fa-money"></i> <span>Pagos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (request()->is('pagos')) ? 'active' : '' }}" ><a href="{{ route('pagos.index') }}"><i class="fa fa-circle-o"></i> Plan de Pagos</a></li>
                        <li  ><a href=""><i class="fa fa-circle-o"></i> Factura</a></li>
                        <li class="{{ (request()->is('cuotas')) ? 'active' : '' }}" ><a href="{{ route('cuotas.index') }}"><i class="fa fa-circle-o"></i>Gestionar Cuotas</a></li>


                    </ul>
                </li>

            @endcan
            @can('Odontologos')
                <li class="desactive treeview">
                    <a href="#">
                        <i class="fa fa-mortar-board"></i> <span>Odontologos</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (request()->is('odontologos')) ? 'active' : '' }}" ><a href="{{ route('odontologos.index') }}"><i class="fa fa-circle-o"></i> Gestionar Odontologos</a></li>
                        <li class="{{ (request()->is('especialidades')) ? 'active' : '' }}" ><a href="{{ route('especialidades.index') }}"><i class="fa fa-circle-o"></i> Gestionar Especialidad </a></li>
                        <li class="{{ (request()->is('recepcionistas')) ? 'active' : '' }}" ><a href="{{ route('recepcionistas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Recepcionista</a></li>
                        <li class="{{ (request()->is('tratamiento')) ? 'active' : '' }}" ><a href="{{ route('tratamiento.index') }}"><i class="fa fa-circle-o"></i> Gestionar Tratamiento</a></li>

                    </ul>
                </li>
            @endcan
            @can('Pacientes')
                <li class="desactive treeview">
                    <a href="#">
                        <i class="fa fa-male"></i> <span>Pacientes</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ (request()->is('historiales')) ? 'active' : '' }}" ><a href="{{ route('historiales.index') }}"><i class="fa fa-circle-o"></i> Historial</a></li>
                        <li class="{{ (request()->is('odontogramas')) ? 'active' : '' }}" ><a href="{{ route('odontogramas.index') }}"><i class="fa fa-circle-o"></i> Odontograma</a></li>
                        <li class="{{ (request()->is('piezas')) ? 'active' : '' }}" ><a href="{{ route('piezas.index') }}"><i class="fa fa-circle-o"></i> Pieza Dental</a></li>
                        <li class="{{ (request()->is('anamnesis')) ? 'active' : '' }}" ><a href="{{ route('anamnesis.index') }}"><i class="fa fa-circle-o"></i> Gestionar Anamnesis</a></li>
                        <li class="{{ (request()->is('padecimientos')) ? 'active' : '' }}" ><a href="{{ route('padecimientos.index') }}"><i class="fa fa-circle-o"></i> Gestionar Padecimientos</a></li>


                    </ul>
                </li>


            @endcan


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
