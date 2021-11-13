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
<input type="button" class="boton-gris" value="Imprimir Formulario" id="create_pdf" onclick="printdiv('ContenedorContabilidad');" />
<div id="ContenedorContabilidad">
<!--  <a onclick ="ImprimePDF();" ><img src="../SiteAssets/img/pdf.png"/></a> -->
  <table id="tblContenedoraContabilidad" style="width:100%; border:0.5px; border-style:solid; border-color:silver;">
  <!--<table id="tblContenedoraContabilidad" class="tablaMateriales"> -->

    <tr>
      <td>
        <table style="width:100%">
        <!--<table class="tablaGenerica">-->

          <tr>
            <td>
              <div id="divEncabezado">
                <table style="width:100%">
                <!--<table class="tblEncabezado">-->
                  <tr>
                    <td style="width: 20%;">Departamento originador:</td>
                    <td style="width: 45%;"><label id="nomDepOriConta" ></label></td>
                    <td></td>
                    <td style="width: 20%;">APE N°</td>
                    <td style="width: 15%;"><label id="apeNumConta"></label></td>
                  </tr>
                  <tr>
                    <td style="width: 20%;">Centro de beneficio:</td>
                    <td style="width: 45%;"><label id="centBeneConta"></label></td>
                    <td></td>
                    <td style="width: 20%;">Fecha de emisión</td>
                    <td style="width: 15%;"><label id="fchFechaConta"></label></td>
                  </tr>
                </table>
              </div>
              <hr style="margin:0px 0px 10px 10px !important;background-color:#dcdcdc;border:none;height:1px;"/>
            </td>
          </tr>
          <tr>
             <td>Sírvase coordinar el retiro del siguiente
              material dado de baja</td>
          </tr>
          <tr>
            <td>
              <table id="tblMaterialesContabilidad" style="width: 100%; border:0.5px; border-style:solid; border-color:silver;">
              <!--<table id="tblMaterialesContabilidad" class="tablaMateriales">-->
                <tr>
                  <!--<th class="thMateriales">Item</th>  para todas la misma clase -->
                  <th style="background:#F2F2F2; padding:3px;">Item</th>
                  <th style="background:#F2F2F2; padding:3px;">Cantidad</th>
                  <th style="background:#F2F2F2; padding:3px;">Unidad de Medida</th>
                  <th style="background:#F2F2F2; padding:3px;">Descripcion</th>
                  <th style="background:#F2F2F2; padding:3px;">Condicion</th>
                  <th style="background:#F2F2F2; padding:3px;">Valor Sugerido USD</th>
                  <th style="background:#F2F2F2; padding:3px;">Activo Fijo</th>
                  <th style="background:#F2F2F2; padding:3px;">Autorizador por SAP</th>
                  <th style="background:#F2F2F2; padding:3px;"></th>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <br/>
    <!--    <hr style="margin:0px 0px 10px 10px !important;background-color:#dcdcdc;border:none;height:1px;"/> -->
        <table id="tblFirmas" style="width: 100%; border:0.5px; border-style:solid; border-color:silver;">
        <!--<table id="tblFirmas" class="tablaMateriales">-->
        </table>
      <!--  <hr style="margin:0px 0px 10px 10px !important;background-color:#dcdcdc;border:none;height:1px;"/> -->
        <br/>
        <table id="tablaContabilidad" style="width: 100%; border:0.5px; border-style:solid; border-color:silver;" >
        <!--<table id="tablaContabilidad" class="tablaMateriales" >-->

          <tr>
            <th style="background:#F2F2F2; padding:3px; width:20%;" colspan="2" >Unidad Contabilidad</th>
            <th style="background:#F2F2F2; padding:3px; width:80%;" colspan="5" >Dirección de Abastecimiento</th>
          </tr>
          <tr>
            <th style="background:#F2F2F2; padding:3px; width:10%;" colspan="1">Ítem</th>
            <th style="background:#F2F2F2; padding:3px; width:10%;" colspan="1" >N° activo fijo</th>
            <th style="background:#F2F2F2; padding:3px; width:30%;" colspan="2" >Destino</th>
            <th style="background:#F2F2F2; padding:3px; width:50%;" colspan="3" >Bodega</th>
          </tr>
          <tr>
            <th colspan="1" style="width:10%;"></th>
            <th colspan="1" style="width:10%;"></th>
            <th style="background:#F2F2F2; padding:3px; width:15%;" colspan="1" >Bodega</th>
            <th style="background:#F2F2F2; padding:3px; width:15%;" colspan="1" >Documento</th>
            <th style="background:#F2F2F2; padding:3px; width:16%;" colspan="1" >Acción</th>
            <th style="background:#F2F2F2; padding:3px; width:16%;" colspan="1" >Valor Sugerido USD</th>
            <th style="background:#F2F2F2; padding:3px; width:18%;" colspan="1" >Documento</th>
          </tr>
        </table>
      <!--  <hr style="margin:0px 0px 10px 10px !important;background-color:#dcdcdc;border:none;height:1px;"/> -->
        <table id="tblContabilidadObservaciones" width="100%">
          <tr>
            <th>Observaciones</th>
          </tr>
        </table>
      <!--  <table>
          <tr>
            <td>
              <div id="buttons" class="botonera">
                <input id="btnE" type="button" class="boton-gris" value="Guardar" onclick="GuardaContabilidad();"/>
              </div>
            </td>
          </tr>
        </table> -->
      </td>
    </tr>
  </table>
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
