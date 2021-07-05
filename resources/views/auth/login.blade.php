@extends('layouts.app')

@section('content')
<div class="site-section cta-big-image background col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="about-section"
>
<div class="container">
    <div class="row" style="float: right;">
        
        <div class="col-md-6" style="padding-left: 100px;"><br><br>
            <div class="login-box">
                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <img src="/images/system/logo.png" alt="Logo" style="width: 255px;
                    margin: auto;display: block;"><br>
        
                <p class="login-box-msg">Complete sus datos para Iniciar Sesión</p><br>
        
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3 col-md">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background: transparent !important;">
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
                            required autocomplete="current-password" style="background: transparent !important;">
        
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
                    </div><br><br>
                    <div class="row" style="display: block;">
                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-12 btncard">
                                <button type="submit" class="btn btn-dark btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                    </div>
                    </div>
                </form><br>
            </div>
        </div>
    </div>
</div>
    {{--  <div class="row mb-5 justify-content-center">
        <div class="col-md-8 text-center">
          <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
          <p class="lead" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus minima neque tempora reiciendis.</p>
        </div>
      </div>  --}}
   
    {{-- <div class="row position " style="float: right;display: block;margin: auto;">
        <div class="contenido ">
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
                            <div class="form-group row mb-0">
                                <div class="col-12 col-md-12 btncard">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                        </div>
                        </div>
                    </form><br>
                </div>
        </div>
    </div> --}}
</div>
@endsection
<style>
    @import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";




 .background {
        background-size: cover;
        display:flex;
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

.login-box{
    
    background: rgba(0,0,0,0.5);
    color: #ffffff;
    padding: 20px 30px;
    border-radius: 5px;
}

.login-box .user-box{
background: #A76542;
width: 100px;
height: 100px;
border-radius: 50%;
position: absolute;
top: 45px;
left:calc(50% - 50px)
}

.login-box .user-box .fas{
    font-size: 60px;
    position: absolute;
    top: 17px;
    left: 24px;
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align:center;
    font-size: 22px;
}

.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.login-box input{
    width: 100%;
    margin-bottom: 20px;
}

.login-box input[type="text"],
input[type="password"]{
    color: #ffffff;
    background: transparent;
    border: none;
    border-bottom: 1px solid #ffffff;
    outline: none;
    height: 40px;
    font-size: 16px;
}

.login-box input[type="submit"]{
    border: none;
    border-radius: 19px;
    outline: none;
    height: 40px;
    background: #A76542;
    color:#ffffff;
    font-size: 18px;
}

.login-box input[type="submit"]:hover{
    background: #A9B3B4;
    cursor: pointer;
}

.login-box a{
    text-decoration: none;
    font-size: 14px;
    color: #ffffff;
}

.login-box a:hover{
    color: #A9B3B4;
}


</style>