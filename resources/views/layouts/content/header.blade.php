<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Dentista</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Dentista </b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!-- Notifications: style can be found in dropdown.less -->

        <!-- Tasks: style can be found in dropdown.less -->

        <!-- User Account: style can be found in dropdown.less -->
      <!--     <li>
              <a href=" route('revisiones.index') ">Notificaciones
                  @if($count=Auth::user()->notifications->count())
                  <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">{{$count}}</span>
                  @endif
              </a>
          </li>-->
          <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
            <span class="hidden-xs">{{ Auth::user()->name }} </span>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <!-- User image -->
           <!-- <li class="user-header">
             <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                Alexander Pierce - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            -->

            <!-- Menu Body -->

            <!-- Menu Footer-->
          <!--  <li class="user-footer">

              <div class="pull-right">
               <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>

                    {{ csrf_field() }}
                  </form>
                </div>
              </li>-->


                          <li>
                               <a href="{{ url('/login') }}"
                                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out fa-fw"></i> Logout</a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                                </form>
                            </li>

          </ul>
        </li>


          <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>

</header>
