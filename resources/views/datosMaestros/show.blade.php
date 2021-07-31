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
                <strong><a href="{{route('datosMaestros.create')}}">Crear Referencia</a></strong>

            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <a href="{{route('datosMaestros.index')}}" class="btn btn-xs btn-danger">
                        <span class="fa fa-arrow-circle-left" data-toggle="tooltip" title="Regresar!"></span>
                    </a>
                    <h5>Referencia Creada</h5>
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
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">

                        <label class=" col-2 " for="text1"><b>Código:</b></label>

                        <label class="col-6  text-primary" for="text1">
                        <b><span class="text-danger"><i class="fa fa-at  text-danger"></i> {{$datosMaestros->codigo}}</span></b></label>
                    </div>
                    <div class="form-group">
                        <label class=" col-2 " for="text1"><b>Referencia:</b></label>
                        <label class="col-6   text-dark" for="text1">
                        <b><span class=""><i class="fa fa-at  text-dark"></i> {{$datosMaestros->referencia}}</span></b></label>
                    </div>
                    <div class="form-group">
                        <label class="col-2 " for="text1"><b>Grupo:</b></label>
                        <label class="col-6   text-dark" for="text1">
                        <b><span class=""><i class="fa fa-at  text-dark"></i> {{$datosMaestros->grupo}}</span></b></label>
                    </div>
                    <div class="form-group">
                        <label class="col-2 " for="text1"><b>Clase:</b></label>
                        <label class="col-6   text-dark" for="text1">
                        <b><span class=""><i class="fa fa-at  text-dark"></i> {{$datosMaestros->clase}}</span></b></label>
                    </div>
                    <div class="form-group">
                        <a href="{{route('datosMaestros.edit',$datosMaestros->id)}}" class="btn btn-primary">Editar</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Especificaciones</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{route('datosMaestros.create')}}" class="dropdown-item">Crear Especificación</a>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th>...</th>
                                <td colspan="2"><center><b>Especificaciones de Formulación</b></center></td>
                                <th>Metodo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $especificaciones as $especificacion)
                                <tr class="gradeX">
                                    <td>{{$especificacion->rownum}}</td>
                                    <td>{{$especificacion->especificacion}}</td>
                                    <td>{{$especificacion->valor}}</td>
                                    <td>{{$especificacion->metodo}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        {{--<table class="table table-stripedtable-bordered table-hover " >

                            <thead>

                              <tr>

                                <th></th>

                                <th colspan="2">Anthony</th>

                                <th colspan="2">Lione</th>

                              </tr>

                              <tr>

                                <th scope="col">Fecha</th>

                                <th>Entrada</th>

                                <th>Salida</th>

                                <th>Entrada</th>

                                <th>Salida</th>

                              </tr>

                            </thead>

                            <tbody>

                              <tr>

                                <th>15/07</th>

                                <td>$200,00</td>

                                <td>$50,00</td>

                                <td>$0</td>

                                <td>$0</td>

                              </tr>

                              <tr>

                                <th>28/07</th>

                                <td>$0,00</td>

                                <td>$100,00</td>

                                <td>$100,00</td>

                                <td>$0,00</td>

                              </tr>

                              <tr>

                                <th>09/08</th>

                                <td>$0,00</td>

                                <td>$50,00</td>

                                <td>$0,00</td>

                                <td>$80,00</td>

                              </tr>

                              <tr>

                                <th>22/08</th>

                                <td>$40,00</td>

                                <td>$0,00</td>

                                <td>$0,00</td>

                                <td>$110,00</td>

                              </tr>

                              <tr>

                                <th>25/08</th>

                                <td>$0,00</td>

                                <td>$20,00</td>

                                <td>$0,00</td>

                                <td>$0,00</td>

                              </tr>

                            </tbody>

                            <tfoot>

                              <tr>

                                <th>Balance</th>

                                <td colspan="2">$20,00</td>

                                <td colspan="2">$10,00</td>

                              </tr>

                            </tfoot>

                        </table>--}}
                        <div class="form-group">
                            @isset($especificaciones[0]->idCodigo)
                                <a href="{{route('especificaciones.edit',$especificaciones[0]->idCodigo)}}" class="btn btn-primary">Editar</a>
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Formula</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{route('datosMaestros.create')}}" class="dropdown-item">Crear Lista Materiales</a>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th>...</th>

                                <th>Código</th>
                                <th>Materia Prima</th>
                                <th>KG Formula</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $listaMateriales as $listaMaterial)
                                <tr class="gradeX">
                                    <td>{{$listaMaterial->rownum}}</td>
                                    <td>{{$listaMaterial->codigo}}</td>
                                    <td>{{$listaMaterial->referencia}}</td>
                                    <td>{{$listaMaterial->formula}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                        <div class="form-group">
                            @isset($listaMaterial)
                            <a href="{{route('datosMaestros.edit',$listaMaterial->idCodigo)}}" class="btn btn-primary">Editar</a>
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
        </div>
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

