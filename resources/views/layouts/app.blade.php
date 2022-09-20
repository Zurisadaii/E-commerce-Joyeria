<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <title>Daisy & Me</title>
    <style>
        #boton {
            margin-top: 5px;
            border-radius: 7px;
            background-color: #ce9d78;
            color: #fff;
            border: 1px solid;
            height: 35px;
        }

        #boton2:focus {
            outline: none;
            outline: none;
        }

        #boton2 {
            color: #fff;
            padding: 0;
            min-width: 45px;;
            width:50px;
            background-color: #b57170;
            border: none;
        }

        #boton3 {
            color: #fff;
            padding: 0;
            width:60%;
        }

        #boton:hover {
            background-color: #FFFFFF;
            color: #9B74C9;
        }

        #navegacion, #navegacion2{
            background-color: #b57170;
            padding-right: 15px;
            padding-left: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            height: 45px;
        }

        #navegacion2 {
            margin-bottom: 25px;
        }
        
        #search{
            width: 80%;
        }

        #search2 {
            width: 55%;
            margin: 0 auto;
        }

        #icons {
            color: #fff;
            font-size: 20px;
        }


        #lupa {
            font-size: 18px;
        }

        #carrito{
            font-size: 28px;
            width: 30px;
        }

        #buscar {
            height: 32px;
        }

        #usu {
            color: white;
        }
        #menu{
            width: 85%;
            margin: 0 auto;
        }
        .dropdown-menu-right {
            right: 0;
            left: auto;
        }
        #listaCarrito {
            min-width: 350px;
            padding: 15px;
        }
        #checkout{
            max-width: 100px;
            background-color: #ce9d78;
            color: #fff;
            border: none;
        }
        #valores{
            color: #D88888;
        }
        #cant {
            font-size: 12px;
        }
        #botonBuscar {
            height: 25px;
            border: none;
            width: 30px;
        }
        #busqueda {
            padding: 8%;
            width: 37px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Daisy & Me') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<body class="vh-100 align-items-middle">
        <nav class="navbar navbar-light" id="navegacion">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/storage/img/logo.png" width="110" height="35" class="d-inline-block align-top" alt="">
            </a>
            <div id="search" class="row">
            @guest
            <form action="{{route('search')}}" method="GET" class="form-inline col" id="search2">
                        <div class="input-group w-75 mx-auto">
                            <input type="text" class="form-control" id="buscar" name="search" placeholder="Búsqueda" aria-label="Búsqueda" aria-describedby="busqueda">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="busqueda"><button type="submit" id="botonBuscar" onclick="location.href='/productos/'"><ion-icon id="lupa" name="search-outline"></ion-icon></button></span>
                            </div>
                        </div>
                    </form>
            @else
                @if (Auth::user()->tipo==1)
                    <form action="{{route('search')}}" method="GET" class="form-inline col" id="search2">
                        <div class="input-group w-75 mx-auto">
                            <input type="text" class="form-control" id="buscar" name="search" placeholder="Búsqueda" aria-label="Búsqueda" aria-describedby="busqueda">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="busqueda"><button type="submit" id="botonBuscar" onclick="location.href='/productos/'"><ion-icon id="lupa" name="search-outline"></ion-icon></button></span>
                            </div>
                        </div>
                    </form>
                @elseif (Auth::user()->tipo==0)
                    <form action="{{route('searchAdmin')}}" method="GET" class="form-inline col" id="search2">
                        <div class="input-group w-75 mx-auto">
                            <input type="text" class="form-control" id="buscar" name="search" placeholder="Búsqueda" aria-label="Búsqueda" aria-describedby="busqueda">
                            <div class="input-group-prepend" >
                                <span class="input-group-text" id="busqueda"><button type="submit" id="botonBuscar" onclick="location.href='/productos/'"><ion-icon id="lupa" name="search-outline"></ion-icon></button></span>
                            </div>
                        </div>
                    </form>
                @endif
            @endguest
                <div id="icons" class="col-4 d-flex flex-row-reverse">
                @auth
                @if (Auth::user()->tipo==1)
                

                <div class="dropdown nav-item">
                    <button type="button" id="boton2" class="nav-item" data-toggle="dropdown">
                    <ion-icon id="carrito" name="cart-outline" ></ion-icon> <span id="cant">{{ count((array) session('cart')) }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right w-50  shadow " id="listaCarrito">
                        <div class="row total-header-section">
                            <div class="col">
                            <ion-icon name="cart-outline" aria-hidden="true"></ion-icon></i> <span class="">{{ count((array) session('cart')) }}</span>
                            </div>
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                                @php $total += $details['precio'] * $details['cantidad'] @endphp
                            @endforeach
                            <div class="col text-right">
                                <p>Total: <span class="" id="valores">$ {{ $total }}</span></p>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                                <div class="row my-3">
                                    <div class="col-4">
                                        <img src='{{URL::to("/")}}/storage/img/{{ $details["imagen"] }}' style='width: 90px;' />
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <p class="mb-1 col-8">{{ $details['nombre'] }}</p>
                                            <span class="col" id="valores"> ${{ $details['precio'] }}</span> 
                                        </div>
                                        <span class="count"> Cantidad:  {{ $details['cantidad'] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="dropdown-divider"></div>
                        <div class="row">
                                <a href="{{ route('cart') }}" class="btn btn-primary m-auto" id="checkout">Checkout</a>
                        </div>
                    </div>
                </div>
                







                    <!-- <a href="#" class="btn" id="boton2"><ion-icon id="carrito" name="cart-outline" ></ion-icon></a> -->
                @endif
                @endauth
                </div>
                
            </div>
        </nav>
        <nav class="navbar navbar-light" id="navegacion2">
            <div id="menu" class="row">
            @guest
                <div class="col text-center">
                    <a href="/" class="btn" id="boton3">Inicio</a>
                </div>
                <div class="col text-center">
                    <a href="/productosG" class="btn" id="boton3">Productos</a>
                </div>
                <div class="col text-center">
                    <a href="/contacto" class="btn" id="boton3">Nosotr@s</a>
                </div>
                <div class="col text-center">
                    <a href="/login" class="btn" id="boton3">Iniciar Sesión</a>
                </div>
                @if (Route::has('register'))
                    <div class="col text-center">
                        <a href="/register" class="btn" id="boton3">Registrarse</a>
                    </div>
                @endif
            @else
                <!-- Usuario Administrador 0
                Usuario Registrado    1
                Usuario Invitado      NA -->
                @if (Auth::user()->tipo==0)
                <div class="col text-center">
                    <a href="/" class="btn" id="boton3">Inicio</a>
                    </div>
                    <div class="col text-center">
                        <a href="/ver-catalogo" class="btn" id="boton3">Editar Catálogo</a>
                    </div>
                    <div class="col text-center">
                        <a href="/pedidosAdmin" class="btn" id="boton3">Pedidos</a>
                    </div>
                @if (Route::has('register'))
                    <div class="col text-center">
                        <a href="/usuarios" class="btn" id="boton3">Usuarios</a>
                    </div>
                @endif
                @endif

                @if (Auth::user()->tipo==1)
                <div class="col text-center">
                    <a href="/" class="btn" id="boton3">Inicio</a>
                    </div>
                    <div class="col text-center">
                        <a href="/productos" class="btn" id="boton3">Productos</a>
                    </div>
                    <div class="col text-center">
                        <a href="/contacto" class="btn" id="boton3">Nosotr@s</a>
                    </div>
                    <div class="col text-center">
                        <a href="/pedidos" class="btn" id="boton3">Pedidos</a>
                    </div>
                @endif
            
                <div id="usu" class="col nav-item dropdown text-center">
                    <div class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hola {{ Auth::user()->name }}!
                    </div>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
            </div>
        </nav> 

        @yield('contenido')

        @extends('footer')
</body>
</html>

