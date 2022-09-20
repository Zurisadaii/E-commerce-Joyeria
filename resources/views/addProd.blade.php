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
    </style>
    
<div class="container" id="cuadro">
    <div class="row align-items-center">
        <div class="col">
            <div class="card border-3" id="contenedor">
                <h4 class="row" id="titulo">Agregar Producto</h4>
                <form action="/guardaProducto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row my-1">
                        <label for="" id="letrero">Nombre de Producto:</label>
                            <input class="form-control" type="text" name="nombreProducto" id="" placeholder="" required>
                        <br>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Descripción: </label>
                            <input class="form-control" type="text" name="descripcion" id="" placeholder="" required>
                        <br>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Precio: </label>
                            <input class="form-control" type="number" name="precio" id="" step="0.01" required>                             <br>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Disponibilidad: </label>
                        <select class="form-control" name="disponibilidad" id="" required>
                            <option value="1">Disponible</option>
                            <option value="2">No Disponible</option>
                            <option value="3">Próximamente</option>
                        </select>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Stock:</label>
                            <input class="form-control" type="number" name="stock" id="" pattern="([0-9])" min="0" step="1" required>                               <br>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Tipo de producto: </label>
                        <select class="form-control" name="tipo" id="" required>
                            <option value="collar">Collar</option>
                            <option value="anillo">Anillo</option>
                            <option value="aretes">Aretes</option>
                            <option value="pulsera">Pulsera</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Imagen:</label>
                            <input class="form-control" type="file" name="imagen" accept="image/*" id="" placeholder="" required onchange="previewFile(this)">
                            <img class="pt-3" id="preview" alt="Vista Previa" style="max-width: 130px">
                        <br>
                    </div>
                    <div class="row my-1">
                        <label for="" id="letrero">Texto Alternativo de Imagen:</label>
                            <input class="form-control" type="text" name="image_alt" id="" placeholder="" required>
                        <br>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                        </div>
                        <div class="col"></div>
                        <divv class="col">
                            <button type="submit" id="boton" class="btn btn-primary my-2">Registrar Producto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>  

<script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function() {
                $("#preview").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection

