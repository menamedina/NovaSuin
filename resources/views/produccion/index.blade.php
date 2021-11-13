@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2>Producción</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('produccion.index')}}">Ordenes de Produccion</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Listado de Ordenes</strong>
            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Listado de Ordenes</h5>
                    <a href="{{route('datosMaestros.index')}}" class="btn btn-xs btn-primary">
                        <span class="fa fa-arrow-circle-right" data-toggle="tooltip" title="Regresar!"></span>
                    Crear OP</a>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="" class="dropdown-item">Crear Orden De Producción</a>
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
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>...</th>
                                <th>Código</th>
                                <th>Referencia</th>
                                <th>Cantidad</th>
                                <th>Lote</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $ordenProducciones as $ordenProduccion)
                                <tr class="gradeX">
                                    <td><a href="" class="btn btn-xs btn-info"><span class="fa fa-edit" data-toggle="tooltip" title="Editar!"></span> </a>
                                        <a href="{{route('produccion.pdfOP',$ordenProduccion->id)}}" class="btn btn-xs btn-warning"><span class="fa fa-print" data-toggle="tooltip" title="Imprimir!"></span> </a>
                                        <a href="{{route('produccion.mailOP',$ordenProduccion->id)}}" class="btn btn-xs btn-primary"><span class="fa fa-envelope" data-toggle="tooltip" title="Enviar al Cliente!"></span> </a>

                                    </td>
                                    <td>{{$ordenProduccion->codigo}}</td>
                                    <td>{{$ordenProduccion->referencia}}</td>
                                    <td>{{$ordenProduccion->cantidad}}</td>
                                    <td>{{$ordenProduccion->lote}}</td>
                                    <td>{{$ordenProduccion->status}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('Datatables')
<script src="{{asset('/assets/script/tabla-simple.js')}}"></script>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    @if(session('mailEnviado') == 'Ok')
    <script>
        Swal.fire(
        'Enviado!',
        'El certificado se envio con exito.',
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




