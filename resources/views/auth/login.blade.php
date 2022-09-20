@extends('layouts.app')

@section('contenido')

<style>
    #cuadro{
        width:35%;
        border-color: #000;
        height: 77%;
    }

    #letrero{
        margin-bottom: 5px;
        font-size: 17px;
    }

    #boton {
        margin-top: 5px;
        border-radius: 7px;
        background-color: #ce9d78;
        color: #fff;
        border: 1px solid;
        height: 35px;
    }

    #boton:hover {
        background-color: #FFFFFF;
        color: #9B74C9;
    }

    #contenedor {
        border-color: #f9f3ee;
        padding: 8%;
        border-radius: 10px;
    }

    #titulo {
        padding-bottom: 5px;
        margin-top: -10px;
    }

    #login {
        height: 100%;
    }

    #recuerda{
        margin-left: 20px;
    }
</style>

<div class="container" id="cuadro">
    <div class="row align-items-center" id="login">
        <div class="col">
            <div class="card border-3" id="contenedor">
                <h4 class="row" id="titulo">Iniciar Sesión</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row my-1">
                            <label for="email" id="letrero">Correo Electrónico:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        </div>
                        <div class="form-group row my-1">
                            <label for="password"id="letrero">Contraseña:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        </div>

                        <div class="form-group row" id="recuerda">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Recuerdame</label>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col d-flex justify-content-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="/register">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <div class="col"></div>
                            <divv class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


