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
                <strong>Referencias</strong>
            </li>
        </ol>
    </div>

</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Referencias</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{route('datosMaestros.create')}}" class="dropdown-item">Crear Referencia</a>
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
                                <th>Grupo</th>
                                <th>Clase</th>
                                <th>Comentario</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datosmaestros as $datosmaestro)
                                <tr class="gradeX">
                                    <td>
                                        <a href="{{route('datosMaestros.show',$datosmaestro->id)}}" class="btn btn-xs btn-info"><span class="fa fa-arrow-circle-right" data-toggle="tooltip" title="Mostar!"></span> </a>
                                        @if ($datosmaestro->grupo=="PT")
                                        <a href="{{route('produccion.create',$datosmaestro->codigo)}}" class="btn btn-xs btn-primary">
                                            <span class="fa fa-flask" data-toggle="tooltip" title="CrearOP!"></span>
                                        </a>
                                        @endif
                                    <td>{{$datosmaestro->codigo}}</td>
                                    <td>{{$datosmaestro->referencia}}</td>
                                    <td>{{$datosmaestro->grupo}}</td>
                                    <td>{{$datosmaestro->clase}}</td>
                                    <td>{{$datosmaestro->comentario}}</td>

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
{{--<script src="{{asset('/assets/script/tabla-simple.js')}}"></script>--}}
<script>
/*$(document).ready(function(){
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},
            {extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ],
        "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "zeroRecords": "No se encontró registro.",
                        "info": "  _START_ de _END_ ( _TOTAL_ Registros Totales).",
                        "infoEmpty": "0 de 0 de 0 registros",
                        "infoFiltered": "(Encontrado de _MAX_registros)",
                        "search": "Buscar: ",
                        "processing": "Procesando la información",
                        "paginate": {
                             "first": " |< ",
                             "previous": "Ant.",
                             "next": "Sig.",
                             "last": " >| "
                         }
                     }

    });

});*/
</script>

<script>

        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom :"<'buttons'B><'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    //dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });


</script>



@endsection
