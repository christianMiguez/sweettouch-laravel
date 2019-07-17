@extends('layouts.app')

@section('body-class', 'login-page sidebar-collapse')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <form class="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="card-header card-header-primary text-center">
                    <h4 class="card-title">Iniciar sesión</h4>

                </div>


                <div class="card-body">

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
									</div>
									<div class="form-check">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>


              </form>
            </div>
          </div>
        </div>
@endsection
