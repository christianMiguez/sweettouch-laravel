@extends('layouts.app')

@section('body-class', 'login-page signup-page sidebar-collapse')

@section('content')

<div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Registro</h4>

                </div>

								<div class="card-body">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                    </div>
                    <input type="text" class="form-control" placeholder="First Name..."  id="name" name="name">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@mail.com">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                        </span>
                    </div>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirma la contraseña">
                  </div>
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Enviar</a>
                </div>
              </form>
            </div>
          </div>
        </div>

@endsection
