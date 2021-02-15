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
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>

    @permission('Administracion y Seguridad')
        <li class="desactive treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>Administracion y Seguridad</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                <li ><a href="{{ url('/home') }}"><i  ></i>Home</a></li>
                <li ><a href="{{ route('users.index') }}"><i class="fa fa-user"></i>Usurios</a></li>
                <li ><a href="{{ route('rolex.index') }}"><i class="fa fa-briefcase"></i>Cargos</a></li>
                <li ><a href="{{ route('permissions.index') }}"><i class="fa fa-briefcase"></i>Privilegios</a></li>
                <li ><a href="{{ route('bitacoras.index') }}"><i class="fa fa-cogs  "></i> Bitacora</a></li>
            </ul>
        </li>
 @endpermission
    @permission('Atencion al Paciente')
        <li class="desactive treeview">
            <a href="#">
                <i class="fa fa-street-view"></i> <span>Atencion al Paciente</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                  <li ><a href="{{ route('pacientes.index') }}"><i class="fa fa-circle-o"></i> Gestionar Paciente</a></li>
                <li ><a href="{{ route('citas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Citas</a></li>
                <li ><a href="{{route('servicios.index')}}"><i class="fa fa-circle-o"></i> Gestionar servicios</a></li>

            <li ><a href="{{ route('agendas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Agenda</a></li>



            </ul>
        </li>

@endpermission
    @permission('Pagos')
        <li class="desactive treeview">
            <a href="#">
                <i class="fa fa-money"></i> <span>Pagos</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                  <li ><a href="{{ route('pagos.index') }}"><i class="fa fa-circle-o"></i> Plan de Pagos</a></li>
                <li ><a href=""><i class="fa fa-circle-o"></i> Factura</a></li>
              <li ><a href="{{ route('cuotas.index') }}"><i class="fa fa-circle-o"></i>Gestionar Cuotas</a></li>


            </ul>
        </li>

        @endpermission
    @permission('Odontologos')
        <li class="desactive treeview">
            <a href="#">
                <i class="fa fa-mortar-board"></i> <span>Odontologos</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
            <li ><a href="{{ route('odontologos.index') }}"><i class="fa fa-circle-o"></i> Gestionar Odontologos</a></li>
             <li ><a href="{{ route('especialidades.index') }}"><i class="fa fa-circle-o"></i> Gestionar Especialidad  </a></li>
               <li ><a href="{{ route('recepcionistas.index') }}"><i class="fa fa-circle-o"></i> Gestionar Recepcionista</a></li>
              <li ><a href=""><i class="fa fa-circle-o"></i> Gestionar Tratamiento</a></li>

            </ul>
        </li>
@endpermission
    @permission('Pacientes')
        <li class="desactive treeview">
            <a href="#">
                <i class="fa fa-male"></i> <span>Pacientes</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                 <li ><a href="{{ route('historiales.index') }}"><i class="fa fa-circle-o"></i> Historial</a></li>
                <li ><a href="{{route('odontogramas.index')}}"><i class="fa fa-circle-o"></i> Odontograma</a></li>
        <li ><a href="{{route('piezas.index')}}"><i class="fa fa-circle-o"></i> Pieza Dental</a></li>
                    <li ><a href="{{route('anamnesis.index')}}"><i class="fa fa-circle-o"></i> Gestionar Anamnesis</a></li>
                 <li ><a href="{{ route('padecimientos.index') }}"><i class="fa fa-circle-o"></i> Gestionar Padecimientos</a></li>


            </ul>
        </li>


@endpermission


     </ul>
   </section>
   <!-- /.sidebar -->
</aside>
