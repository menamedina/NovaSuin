@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Datos Maestros</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('datosMaestros.index')}}">Datos Maestros</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Crear Referencia</strong>
            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Referencia</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Crear Referencia</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="{{route('datosMaestros.store')}}" method="POST" class="formulario-confirmar" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group @error('codigo') has-error @enderror row">
                            <label class="col-3 col-form-label" for="text1"><b>Código:</b>&nbsp;&nbsp;<small class="text-danger">*</small></label>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-barcode"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="codigo" name="codigo" autocomplete="off"  class="form-control form-control-sm" value="{{old('codigo')}}" placeholder="digite el código ..."  onchange="validarCodigo()">
                                </div>
                                @error('codigo')
                                    <small class="text-danger">* {{$message}}</small><br>
                                @enderror
                                <br>
                                @if(session('error') == 'duplicado')
                                    <div class="alert alert-danger" role="alert">
                                        la identificación o Tag ya existe en la base de datos
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group @error('referencia') has-error @enderror row">
                            <label class="col-3 col-form-label" for="text1"><b>Referencia:</b>&nbsp;&nbsp;<small class="text-danger">*</small></label>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-barcode"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="referencia" name="referencia" autocomplete="off"  class="form-control form-control-sm" value="{{old('referencia')}}" placeholder="digite la referencia ...">
                                </div>
                                @error('referencia')
                                    <small class="text-danger">* {{$message}}</small><br>
                                @enderror
                                <br>
                                @if(session('error') == 'duplicado')
                                    <div class="alert alert-danger" role="alert">
                                        la identificación o Tag ya existe en la base de datos
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group @error('grupo') has-error @enderror row">
                            <label class="col-3 col-form-label" for="text1"><b>Grupo:</b>&nbsp;&nbsp;<small class="text-danger">*</small></label>
                            <div class="col-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>
                                    <select name="grupo" id="grupo" class="form-control form-control-sm"  >
                                        <option value="" selected></option>
                                         <option value="Resina" {{ old('grupo') == "Resina" ? 'selected' : '' }}>Resina</option>
                                         <option value="Gelcoat" {{ old('grupo') == "Gelcoat" ? 'selected' : '' }}>Gelcoat</option>
                                         <option value="Poltrución" {{ old('grupo') == "Poltrución" ? 'selected' : '' }}>Poltrución</option>
                                         <option value="Materia Prima" {{ old('grupo') == "Materia Prima" ? 'selected' : '' }}>Materia Prima</option>
                                         <option value="Material Empaque" {{ old('grupo') == "Material Empaque" ? 'selected' : '' }}>Material Empaque</option>


                                    </select>
                                </div>
                            <br>
                                    @if(session('error') == 'grupo')
                                    <div class="alert alert-danger" role="alert">
                                        si el sexo es hembra, no puede ser reproductor
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-9">
                                <label f or="commentario"><b><i class="fa fa-comments"> </i>&nbsp;&nbsp;Comentario:</b></label>
                                    <textarea class="form-control" id="commentario" name="comentario" rows="4" value="{{old('comentario')}}" placeholder="Puede Digitar Algún Comentario">{{ old('comentario')}}</textarea>
                                    <br><small class="text-danger">* Los campos marcados en rojos son obligatorios</small>

                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1" hidden><b>Usuario</b></label>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function validarCodigo(){
        let codigo = $('#codigo').val();
        console.log(codigo);
        $.ajax({
            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
        url:'/datosMaestros/validar/codigo/'+codigo,
        type: "GET",
        dataType: "JSON",

        success: function(response){
              alert('Correcto');
        },

        error: function(response){
            console.log(codigo);
           /* Swal.fire(
                    'Error!',
                    'La identificación ya existe',
                    'error'
            )*/
      }
    });
    }
  </script>
    @if(session('error') == 'codigoExiste')
    <script>
        Swal.fire(
        'Error!',
        'El Código ya Existe en la Base de Datos',
        'error'
        )
        //   $('#myModal2 ').modal('show');
    </script>
    @endif
    @if(session('actualizado') == 'ok')
    <script>
        Swal.fire(
        'Actualizado!',
        'Su Registro fue Actualiado con Exito.',
        'success'
        )
    </script>
    @endif
    @if(session('Guardado') == 'Ok')
    <script>
        Swal.fire(
        'Guardado!',
        'Su Registro fue Guardado con Exito.',
        'success'
        )
    </script>
    @endif
    @if(session('eliminado') == 'ok')
    <script>
        Swal.fire(
        'Eliminado!',
        'Su Registro fue Eliminado.',
        'success'
        )
    </script>
    @endif
@endsection
@section('Datatables')
<!--<script src="{asset('/assets/script/tabla-simple.js')}}"></script> -->
@endsection
