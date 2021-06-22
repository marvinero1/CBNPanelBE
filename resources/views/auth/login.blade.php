@extends('layouts.app')

@section('content')
<div class="site-section cta-big-image background col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="about-section"
>
   
    {{--  <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
          <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
        </div>
      </div>  --}}
   
    <div class="row position" style="float: right;display: block;margin: auto;">
        <div class="contenido">
            {{-- <div class="login-logo">
            <b>Panel</b>ADMIN
            </div> --}}
            <!-- /.login-logo -->
            <div class="card content row" style="width: 23rem;">
                <div class="card-body login-card-body ">
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <img src="/images/system/logo.png" alt="Logo" style="width: 255px;
                        margin: auto;display: block;"><br><br>

                    <p class="login-box-msg">Complete sus datos para Iniciar Sesión</p><br>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3 col-md">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3 col-md">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Recuerdame</label>
                            </div>
                        </div><br>
                        <div class="row" style="display: block;">

                            <!-- /.col -->
                            {{-- <div class="col-12 col-md-6 btncard"> --}}
                            {{-- <button type="submit" class="btn btn-dark btn-block">Ingresar</button> --}}
                            {{-- </div> --}}
                            <div class="form-group row mb-0">
                                <div class="col-12 col-md-12 btncard">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                {{-- <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div> --}}

                        </div>
                        <!-- /.col -->
                        </div>
                    </form><br>
                </div>
            <!-- /.login-card-body -->
        </div>
    </div>   
</div>
@endsection

<style>
    .background {
        background-size: cover;
        height: 100% !important;
        background-image: url("images/system/fondoLogin.png");
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    @media screen and (max-width:400px) {
        .background {
            height: 139% !important;
            background-repeat: cover;
            background-size: cover;
        }
    }

    @media screen and (max-height:550px) {
        .background {
            height: 100% !important;
        }
    }

    @media screen and (max-height:375px) {
        .background {
            height: 136% !important;
        }
    }

    @media screen and (max-height:280px) {
        .background {
            height: 193% !important;
        }
    }

    .content {
        display: block;
        margin: auto;
    }

    .btncard {
        width: 22%;
        display: block;
        margin: auto;
        text-align: center;
    }

    .card-body {
        background: linear-gradient(0deg, rgba(82, 223, 223, 1) 24%, rgba(6, 64, 222, 1) 76%) !important;
    }

    .contenido {
        padding-top: 8.5rem !important;
    }
</style>