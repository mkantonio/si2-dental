@extends('layouts.app')
<div class="container">
@section('content')
<div class="limiter">
  <div class="container-login100">
{{--     <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
            <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul> --}}
    <div class="wrap-login100">
      <div class="login100-pic js-tilt" data-tilt>
        <img src="{{asset('Prueba/images/schone-tandachtergrond_1270-86.jpg')}}" alt="IMG">
      </div>

      <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
          {{ csrf_field() }}

          <span class="login100-form-title">
              CONSULTORIO DENTAL
          </span>

          <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="col-md-4 control-label col-form-label ml-md-5"><h4>Email</h4></label>

              <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label col-form-label ml-md-5"><b><h4>Constraseña</h4></b></label>

              <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} class="ml-md-5"> Recuerdame
                      </label>
                  </div>
              </div>
          </div>

          <div class="form-group row">
              <div class="col-md-8 col-md-offset-4">
                  <button style="min-width: 60px;height: 60px" type="submit" class="btn btn-success">
                      <h3>Iniciar Sesion</h3>
                  </button>

                  <a class="btn btn-link" href="{{ url('/password/reset') }}">
                      Olvidaste tu Contraseña?
                  </a>
              </div>
          </div>
      </form>
                </div>
            </div>
        </div>

@endsection
</div>

<script>
document.addEventListener("DOMContentLoaded", function(){
    // var idapp = document.getElementById("app");
    // idapp.removeChild(idapp.childNodes[1]);


}); 
</script>