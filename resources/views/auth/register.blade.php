@extends('layouts.app')

@section('contenido')



<style>
    #cuadro{
        width:45%;
        border-color: #000;
        height: auto;
        margin-bottom: 25px;
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
        padding: auto;
    }

    #boton:hover {
        background-color: #FFFFFF;
        color: #b57170;
    }

    #contenedor {
        border-color: #f9f3ee;
        padding: 6%;
        border-radius: 10px;
    }

    #titulo {
        padding-bottom: 5px;
        margin-top: -10px;
    }

    #login {
        height: 100%;
    }

    #opciones{
            margin-left: 10px;
        }
</style>

<div class="container" id="cuadro">
    <div class="row align-items-center" id="login">
        <div class="col">
            <div class="card border-3" id="contenedor">
                <h4 class="row" id="titulo">Registrarse</h4>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row my-1">
                            <label for="name" id="letrero">Nombre:</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        </div>
                        <div class="form-group row my-1">
                            <label for="apellidoP" id="letrero">Apellido Paterno:</label>
                            <input id="apellidoP" type="text" class="form-control @error('apellidoP') is-invalid @enderror" name="apellidoP" value="{{ old('apellidoP') }}" required autocomplete="apellidoP" autofocus>
                            @error('apellidoP')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        </div>
                        <div class="form-group row my-1">
                            <label for="apellidoM" id="letrero">Apellido Materno:</label>
                            <input id="apellidoM" type="text" class="form-control @error('apellidoM') is-invalid @enderror" name="apellidoM" value="{{ old('apellidoM') }}" required autocomplete="apellidoM" autofocus>
                            @error('apellidoM')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                        </div>
                        <div class="form-group row my-1">
                            <label for="email" id="letrero">Correo Electrónico:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row my-1">
                            <label for="" id="letrero">Contacto:</label>
                            <div class="form-check col my-2" id="opciones">
                                <input type="radio" class="form-check-input" id="Facebook" name="metodoContacto" value="Facebook" required>
                                <label class="form-check-label" for="Facebook">Facebook</label>
                            </div>
                            <div class="form-check col my-2" id="opciones">
                                <input type="radio" class="form-check-input" id="Whatsapp" name="metodoContacto" value="Whatsapp" required>
                                <label class="form-check-label" for="Whatsapp">Whatsapp</label>
                            </div>
                            <div class="form-check col my-2" id="opciones">
                                <input type="radio" class="form-check-input" id="Instagram" name="metodoContacto" value="Instagram" required>
                                <label class="form-check-label" for="Instagram">Instagram</label>
                            </div>
                            <br>
                            <div class="row my-1" id="ingresaUsuario">
                                
                            </div>
                        </div>
                        <div class="form-group row my-1">
                            <label for="password" id="letrero">Contraseña:</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row my-1">
                            <label for="password-confirm" id="letrero">Confirma Contraseña:</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col d-flex justify-content-center">
                                <a href="/login" class="btn btn-link my-2">Iniciar Sesión</a>
                            </div>
                            <div class="col"></div>
                            <div class="col d-flex justify-content-center">
                                <button type="submit" id="boton" class="btn btn-primary m-2">Registrarse</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// $("#Facebook_select").hide();
// $("#Whatsapp_select").hide();
// $("#Instagram_select").hide();
var showW = false;
var showF = false;
var showI = false;
$(document).ready(function() {            
    $('input[name="metodoContacto"]').click(function() {
        if (!$("input[id='Facebook']").is(":checked")) {
            // $("#Facebook_select").hide();
            $('#face').remove();
            $('#face2').remove();
            showF = false;
        } else
        if ($("input[id='Facebook']").is(":checked") && showF == false) {
        //$("#Facebook_select").show();
            $('#ingresaUsuario').append("<label id='face' class='col-4' for='face'>Usuario Facebook:</label>")
            $('#ingresaUsuario').append("<input id='face2' class='form-control col' type= 'text' name='usuarioContacto' value='' required>")
            showF = true;
        }
        if (!$("input[id='Whatsapp']").is(":checked")) {
            $('#whats').remove();
            $('#whats2').remove();
            showW = false;
        } else 
        if ($("input[id='Whatsapp']").is(":checked") && showW == false) {
            //$("#Whatsapp_select").show();
            $('#ingresaUsuario').append("<label id='whats' class='col-4' for='whats'>Contacto Whatsapp:</label>")
            $('#ingresaUsuario').append("<input id='whats2' class='form-control col' type='text' name='usuarioContacto' value='' maxlength='10' minlength='10' oninput='this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');' required>")
            showW = true;
        }
        if (!$("input[id='Instagram']").is(":checked")) {
            $('#insta').remove();
            $('#insta2').remove();
            showI = false;
        } else 
        if ($("input[id='Instagram']").is(":checked") && showI == false) {
            $('#ingresaUsuario').append("<label id='insta' class='col-4' for='insta'>Usuario Instagram:</label>")
            $('#ingresaUsuario').append("<input id='insta2' class='form-control col' type='text' name='usuarioContacto' value='' required>")
            showI = true;
        }
    });
});
</script>

@endsection
