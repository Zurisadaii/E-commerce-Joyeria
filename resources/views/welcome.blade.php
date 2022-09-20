@extends('layouts.app')

@section('contenido')
<style>
    #fotosInicio{
        margin-top: -20px;
        height: 450px;
    }
</style>

<div id="fotosInicio" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#fotosInicio" data-slide-to="0" class="active"></li>
    <li data-target="#fotosInicio" data-slide-to="1"></li>
    <li data-target="#fotosInicio" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{URL::to('/')}}/storage/img/carousel4.jpg" alt="Doble anillo">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::to('/')}}/storage/img/carousel6.jpg" alt="Collar con brillante">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::to('/')}}/storage/img/carousel1.jpg" alt="Anillo con Brillante">
    </div>
  </div>
  <a class="carousel-control-prev" href="#fotosInicio" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#fotosInicio" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container mt-4 w-75">
    <h4>Bienvenid@ a Daisy & ME</h4>
    <h5 class="my-5" style="font-weight: normal">Nos especializamos en joyería fina para todos los gustos. Empresa 100% potosina.</h5>
    
    <div class="card">
        <div class="card-header">
            <h5 class="my-2">Algunos de nuestros clientes</h5>
        </div>
        <div class="card-body p-1">
            <div class="row">
                <div class="col"><img class="d-block w-100" style="height: 400px" src="{{URL::to('/')}}/storage/img/cliente1.jpeg" alt="Anillo con Brillante"></div>
                <div class="col"><img class="d-block w-100" style="height: 400px" src="{{URL::to('/')}}/storage/img/cliente2.jpeg" alt="Anillo con Brillante"></div>
                <div class="col"><img class="d-block w-100" style="height: 400px" src="{{URL::to('/')}}/storage/img/cliente3.jpg" alt="Anillo con Brillante"></div>
                <div class="col"><img class="d-block w-100" style="height: 400px" src="{{URL::to('/')}}/storage/img/cliente4.jpeg" alt="Anillo con Brillante"></div>
            </div>
        </div>
        
    </div>
    
    
</div>
@endsection