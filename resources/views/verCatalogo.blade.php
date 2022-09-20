@extends('layouts.app')

@section('contenido')

<style>
        #cuadro{
            width:95%;
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
        }

        #boton:hover {
            background-color: #FFFFFF;
            color: #9B74C9;
        }

        #contenedor {
            border-color: #f9f3ee;
            padding: 6%;
            border-radius: 10px;
            height: 80%;
        }

        #titulo {
            padding-bottom: 5px;
            margin-top: -10px;
        }
        
        #opciones{
            margin-left: 10px;
        }
    </style>
<div class="container" id="cuadro">
    <div class="container d-flex flex-row-reverse">
    <input type="button" name="agregaProducto" value="Agregar Producto +" class="btn btn-primary agregaProducto">
    </div>
    <h4>Productos en Sistema</h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Stock</th>
                <th scope="col">Tipo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Alternativa Imagen</th>
                <th scope="col">Editar Producto</th>
            </tr>
        </thead>
        @if ($productos->isEmpty())

        @else
        <tbody>
        
        @foreach ($productos as $p)
        @if($p->borrado == 0)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->nombreProducto}}</td>
                <td>{{$p->descripcion}}</td>
                <td>${{$p->precio}}</td>
                @if (($p->disponibilidad)==1)
                <td>Disponible</td>
                @endif
                @if (($p->disponibilidad)==2)
                <td>No Disponible</td>
                @endif
                @if (($p->disponibilidad)==3)
                <td>Próximamente</td>
                @endif
                <td>{{$p->stock}}</td>
                @if (($p->tipo)=='collar')
                <td>Collar</td>
                @endif
                @if (($p->tipo)=='aretes')
                <td>Aretes</td>
                @endif
                @if (($p->tipo)=='pulsera')
                <td>Pulsera</td>
                @endif
                @if (($p->tipo)=='anillo')
                <td>Anillo</td>
                @endif
                @if (($p->tipo)=='otro')
                <td>Otro</td>
                @endif
                <td><img src="{{asset('/storage/img/'.$p->imagen)}}" style="max-height:60px;"></td>
                <td>{{$p->image_alt}}</td>
                <td  style="text-align:center">
                    <input type="button" name="edit" value="Editar" id=<?php echo $p->id; ?> class="btn btn-primary edit_data">
                    <br><br>
                    <button class="btn btn-primary"  onclick="location.href='/eliminar/{{$p->id}}'">Eliminar</burron>
                </td>
            </tr>
        @endif
        @endforeach
        </tbody>
        @endif
    </table>
    <br>
    <h4>Productos Dados de Baja</h4>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">Stock</th>
                <th scope="col">Tipo</th>
                <th scope="col">Imagen</th>
                <th scope="col">Alternativa Imagen</th>
                <th scope="col">Editar Producto</th>
            </tr>
        </thead>
        @if ($productos->isEmpty())

        @else
        <tbody>
        @foreach ($productos as $p)
        @if($p->borrado == 1)
            <tr>
                <th scope="row">{{$p->id}}</th>
                <td>{{$p->nombreProducto}}</td>
                <td>{{$p->descripcion}}</td>
                <td>{{$p->precio}}</td>
                @if (($p->disponibilidad)==1)
                <td>Disponible</td>
                @endif
                @if (($p->disponibilidad)==2)
                <td>No Disponible</td>
                @endif
                @if (($p->disponibilidad)==3)
                <td>Próximamente</td>
                @endif
                <td>{{$p->stock}}</td>
                @if (($p->tipo)=='collar')
                <td>Collar</td>
                @endif
                @if (($p->tipo)=='aretes')
                <td>Aretes</td>
                @endif
                @if (($p->tipo)=='pulsera')
                <td>Pulsera</td>
                @endif
                @if (($p->tipo)=='anillo')
                <td>Anillo</td>
                @endif
                @if (($p->tipo)=='otro')
                <td>Otro</td>
                @endif
                <td><img src="{{asset('/storage/img/'.$p->imagen)}}" style="max-height:60px;"></td>
                <td>{{$p->image_alt}}</td>
                <td style="text-align:center">
                    <!-- <a type="button" class="btn btn-primary editar"  id="edit-button" href="">Editar</a> -->
                <!-- /editar/{{$p->id}} -->
                    <input type="button" name="edit" value="Editar" id=<?php echo $p->id; ?> class="btn btn-primary edit_data">
                <!-- <td><button type="button" class="btn btn-primary editar"  id="edit-button {{$p->id}} {{$p->nombreProducto}} {{$p->descripcion}} {{$p->precio}} {{$p->disponibilidad}} {{$p->stock}} {{$p->imagen}} {{$p->image_alt}}" href="/editar/{id}">Editar</button> -->
                <br><br>
                <button class="btn btn-primary" onclick="location.href='/reestablecer/{{$p->id}}'">Reestablecer</button>
                </td>
            </tr>
        @endif
        @endforeach
        </tbody>
        @endif
    </table>
    <br><br>
</div>



<div class="modal fade" id="new-Modal" role="dialog" tabindex="-1" aria-labelledby="new-Modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nuevoProductoLabel">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/guardaProducto" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <label for="">Nombre Producto: </label>
                        <input type="text" class="form-control" name="nombreProducto" id="new-nomProducto" value="" required>
                    <br>
                    <label for="">Descripción: </label>
                        <textarea type="text" class="form-control" name="descripcion" cols="40" rows="5" id="new-descrip" value="" required></textarea>
                    <br>
                    <label for="">Precio: </label>
                        <input class="form-control" type="number" name="precio" id="new-precio" step="0.01" value="" required>
                    <br>
                    <label for="" id="letrero">Disponibilidad: </label>
                    <select class="form-control" name="disponibilidad" id="new-disponibilidad">
                        <option value="1">Disponible</option>
                        <option value="2">No Disponible</option>
                        <option value="3">Próximamente</option>
                    </select>
                    <br>
                    <label for="" id="letrero">Stock:</label>
                        <input class="form-control" type="number" name="stock" id="new-stock" pattern="([0-9])" min="0" step="1" value="" required>
                    <br>
                    <label for="" id="letrero">Tipo de producto: </label>
                    <select class="form-control" name="tipo" id="">
                        <option value="collar">Collar</option>
                        <option value="anillo">Anillo</option>
                        <option value="aretes">Aretes</option>
                        <option value="pulsera">Pulsera</option>
                        <option value="otro">Otro</option>
                    </select>
                    <br>
                    <div id="foto">
                        <label for="" id="letrero">Imagen:</label>
                        <input class="form-control" type="file" name="imagen" accept="image/*" id="" placeholder=""  required onchange="previewFile(this)">
                        <img class="pt-3" id="preview2" alt="Vista Previa" style="max-width: 130px">
                    <br>
                    </div>                    
                    <label for="" id="letrero">Texto Alternativo de Imagen:</label>
                        <input class="form-control" type="text" name="image_alt" id="new-textAlt" value="" placeholder="" required>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>



@if ($productos->isEmpty())

@else
<div class="modal fade" id="edit-Modal" role="dialog" tabindex="-1" aria-labelledby="edit-Modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoLabel">Edicion de Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/guardaProducto" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="identificador" id="edit-identificador" value="">
                    <label for="">Producto: </label>
                        <input type="text" class="form-control" name="nombreProducto" id="edit-nomProducto" value="" required>
                    <br>
                    <label for="">Descripción: </label>
                        <textarea name="descripcion" id="edit-descrip" class="form-control" cols="40" rows="5" value="" required></textarea>
                        <!-- <input type="text" class="form-control" name="descripcion" id="edit-descrip" value="" required> -->
                    <br>
                    <label for="">Precio: </label>
                        <input class="form-control" type="number" name="precio" id="edit-precio" step="0.01" value="" required>
                    <br>
                    <label for="" id="letrero">Disponibilidad: </label>
                    <select class="form-control" name="disponibilidad" id="edit-disponibilidad">
                        <option value="1" @if($p->disponibilidad == 1) selected @endif>Disponible</option>
                        <option value="2" @if($p->disponibilidad == 2) selected @endif>No Disponible</option>
                        <option value="3" @if($p->disponibilidad == 3) selected @endif>Próximamente</option>
                    </select>
                    <br>
                    <label for="" id="letrero">Stock:</label>
                        <input class="form-control" type="number" name="stock" id="edit-stock" pattern="([0-9])" min="0" step="1" value="" required>
                    <br>
                    <label for="" id="letrero">Tipo de producto: </label>
                    <select class="form-control" name="tipo" id="edit-tipo">
                        <option value="collar" @if($p->tipo == 'collar') selected @endif>Collar</option>
                        <option value="anillo" @if($p->tipo == 'anillo') selected @endif>Anillo</option>
                        <option value="aretes" @if($p->tipo == 'aretes') selected @endif>Aretes</option>
                        <option value="pulseras" @if($p->tipo == 'pulsera') selected @endif>Pulsera</option>
                        <option value="otro" @if($p->tipo == 'otro') selected @endif>Otro</option>
                    </select>
                    <br>
                    <div id="foto">
                        <label for="" id="letrero">Imagen:</label>
                        <input class="form-control" type="file" name="imagen" accept="image/*" id="" placeholder="" onchange="previewFile(this)">
                        <img src='' id='preview' class="mt-2" style='max-height:60px;'>
                    <br>
                    </div>        
                    <label for="" id="letrero">Texto Alternativo de Imagen:</label>
                        <input class="form-control" type="text" name="image_alt" id="edit-textAlt" value="" placeholder="" required>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_data', function(){
        var prod_id = $(this).attr('id');
        
        $.ajax({
            method:"GET",
            url:"/editar/"+prod_id,
            //console.log(prod_id);
            success: function(response){
                $('#edit-identificador').val(response.id);
                $('#edit-nomProducto').val(response.nombreProducto);
                $('#edit-precio').val(response.precio);
                $('#edit-descrip').val(response.descripcion);
                $('#edit-disponibilidad').val(response.disponibilidad);
                $('#edit-stock').val(response.stock);
                $('#edit-tipo').val(response.tipo);
                $('#preview').attr('src', '{{URL::to("/")}}/storage/img/'+response.imagen);
                $('#edit-textAlt').val(response.image_alt);
                $('#edit-Modal').modal('show');

                },
            })
        })

        $(document).on('click','.agregaProducto',function(){
            $('#new-Modal').modal('show');
        });

        $("#new-Modal").on("hidden.bs.modal", function() { $(this).find('form').trigger("reset"); });
    });
    
    function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if(file){
                var reader = new FileReader();
                reader.onload = function() {
                    $("#preview").attr("src",reader.result);
                    $("#preview2").attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    
</script>

@endsection


