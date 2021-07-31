<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'NovaSuin') }}</title>
    <!-- Scripts
    <script src="{ asset('js/app.js') }}" defer></script>
     Fonts
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     Styles
    <link href="{ asset('css/app.css') }}" rel="stylesheet">
    -->

    <title>NovaSuin</title>
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{asset('assets/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{{ asset('assets/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{ asset('assets/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <!-- datatbles -->
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

<style>

    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      font-size: 12px;

    }
    /* setting the text-align property to center*/
     td {
      padding: 3px;
      /*text-align:center;*/
     /* font-size: 12px;*/

    }
    th {
      padding: 3px;

    }
    h4{
        text-align: center;
        padding: 5px;
        /*font-size: 12px;*/

    }
    h5{
        text-align: center;
        padding: 5px;
        /*font-size: 12px;*/

    }
    .left {
        display: inline-block;
        }

    .right {
        display: inline-block;
        }

    </style>
    <?php
    $path = 'img/logonovasuin.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    </head>
    <body>
    <!-- ?php echo $base64?> -->
    <table  class="table table-striped table-bordered table-hover" >
        <thead>
            <tr>
                <th colspan="7">
                    <img src="{{$base64}}" width="500" height="100"/><br>
                    <span class="text-center">ORDEN DE PRODUCCIÓN</span>
                </th>
            </tr>
            <tr>
                <th colspan="2" class="text-center">REFERENCIA</th>
                <th >CÓDIGO</th>
                <th >EQUIPO</th>
                <th >CANTIDAD</th>
                <th >LOTE</th>
                <th >ESTADO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $ordenProducciones as $ordenProduccion)
            <tr>
                <td colspan="2">{{$ordenProduccion->referencia}}</td>
                <td text-align="center"><center>{{$ordenProduccion->codigo}}</center></td>
                <td><center>{{$ordenProduccion->equipo}}</center></td>
                <td><center>{{$ordenProduccion->cantidad}}</center></td>
                <td><center>{{$ordenProduccion->lote}}</center></td>
                <td><center>{{$ordenProduccion->status}}</center></td>

            </tr>
            @endforeach
        </tbody>
        <thead>

            <tr>
                <td colspan="7" class="text-center">FECHA INICIO:______________________  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    FECHA TERMINO:_______________________</td>
            </tr>
            <tr>
                <td colspan="4" class="text-center"><center><b>Especificaciones de Formulación</b></center></td>
                <th colspan="1">Metodo de Analisis</th>
                <th colspan="2">Observaciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $especificaciones as $especificacion)
                <tr class="gradeX">
                    <td colspan="3" style='text-align:left; vertical-align:middle' >{{$especificacion->especificacion}}</td>
                    <td colspan="1" align="center">{{$especificacion->valor}}</td>
                    <td colspan="1" align="center">{{$especificacion->metodo}}</td>
                    <td colspan="2"></td>
                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <th colspan="7" ><center>CARGA DE RESINA MAS ADITIVO</center></th>
            </tr>
            <tr>
                {{--<td colspan="2"><center><b>Especificaciones de Formulación</b></center></td>--}}
                <th>...</th>
                <th>CÓDIGO</th>
                <th>MATERIA PRIMA</th>
                <th>KG FORMULA</th>
                <th>KG CARGA</th>
                <th>LOTE</th>
                <th>OPERADOR</th>

            </tr>
        </thead>
        <tbody>
            @foreach ( $ordenProduccionesD as $ordenProduccionD)
                <tr class="gradeX">
                    <td>{{$ordenProduccionD->rownum}}</td>
                    <td>{{$ordenProduccionD->codigo}}</td>
                    <td>{{$ordenProduccionD->materiaPrima}}</td>
                    <td style='text-align:right; vertical-align:middle'>{{$ordenProduccionD->KGFormula}}</td>
                    <td style='text-align:center; vertical-align:middle'>{{$ordenProduccionD->KGCarga}}</td>
                    <td style='text-align:center; vertical-align:middle'>{{$ordenProduccionD->lote}}</td>
                    <td>{{$ordenProduccionD->operador}}</td>

                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <th colspan="7" style='text-align:center; vertical-align:middle'>ADICIONES DE AJUSTE AL PROCESO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="7" style='text-align:center; vertical-align:middle'>INDICACIONES DE EMPAQUE O USO DE LA RESINA</th>
            </tr>
            <tr>
                <th colspan="2" style='text-align:center; vertical-align:middle'>REFERENCIA</th>
                <th colspan="1" style='text-align:center; vertical-align:middle'>LOTE</th>
                <th colspan="1" style='text-align:center; vertical-align:middle'>CANTIDAD</th>
                <th colspan="1" style='text-align:center; vertical-align:middle'>REFERENCIA</th>
                <th colspan="1" style='text-align:center; vertical-align:middle'>LOTE</th>
                <th colspan="1" style='text-align:center; vertical-align:middle'>CANTIDAD</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>

            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>

            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style='text-align:right; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>
                <td style='text-align:center; vertical-align:middle'>&nbsp;</td>

            </tr>
        </tbody>
        <thead>
            <tr>
                <th colspan="7" style='text-align:center; vertical-align:middle'>ANALISIS</th>
            </tr>
            <tr>
                <th colspan="2">FECHA</th>
                <th>HORA INICIO</th>
                <th>HOTA FINAL</th>
                <th colspan="2" style='text-align:center; vertical-align:middle'>RESPONSABLE</th>
                <th style='text-align:center; vertical-align:middle'>TIEMPO TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">&nbsp;weqr</td>
                <td >&nbsp;rqwe</td>
                <td >&nbsp;qwe</td>
                <td colspan="2">&nbsp;qwe</td>
                <td >&nbsp;qwe</td>
            </tr>
        </tbody>
    </table>
    <br>

        <table id="tabla1" width=100% border="0">
            <tr>
                <td id="nested">
                    <table id="tabla2">
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;PROFORMA</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;NACIONAL&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;TIPO DE ENVASE&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;CUÑETE&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;PESO POR ENVASE&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;20 KG</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;CLIENTE</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;NACIONAL</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;DATOS DE COSTO&nbsp;&nbsp;</th>
                            <th colspan="2">&nbsp;&nbsp;</th>
                        </tr>
                    </table>
                </td>

                <td>
                    <table id="tabla2">
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;TOTAL CARGA&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;0.000&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;TOTAL OBTENIDO&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;0.000&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;EFICIENCIA&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;0.00 %&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3" style='text-align:left; vertical-align:middle'>&nbsp;&nbsp;TOTAL PROCESO&nbsp;&nbsp;</th>
                            <th colspan="2" style='text-align:center; vertical-align:middle'>&nbsp;&nbsp;0.000&nbsp;&nbsp;</th>
                        </tr>
                        <tr>
                            <th colspan="3">&nbsp;</th>
                            <th colspan="2">&nbsp;</th>
                        </tr>
                    </table>
                </td>
            </tr>

          </table>

    <script src="{{ asset('/assets/js/jquery-3.1.1.min.js')}}"></script>
    {{-- <script src="{{ Asset('/assets/js/plugins/jquery/jquery-3.5.1.min.js')}}"></script> --}}
    <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('/assets/js/bootstrap.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{ asset('/assets/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <!-- Peity -->
    <script src="{{ asset('/assets/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('/assets/js/demo/peity-demo.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('/assets/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- GITTER -->
    <script src="{{ asset('/assets/js/plugins/gritter/jquery.gritter.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('/assets/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Sparkline demo data  -->
    <script src="{{ asset('/assets/js/demo/sparkline-demo.js')}}"></script>
    <!-- ChartJS-->
    <script src="{{ asset('/assets/js/plugins/chartJs/Chart.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('/assets/js/plugins/toastr/toastr.min.js')}}"></script>

    <!-- FooTable -->
    <script src="{{asset ('/assets/js/plugins/footable/footable.all.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{ asset('/assets/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{ asset('/assets/js/inspinia.js')}}"></script>
    <script src="{{ asset('/assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- Ladda lording-->
    <script src="{{asset('/assets/js/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{asset('/assets/js/plugins/ladda/ladda.jquery.min.js')}}"></script>

    <!-- Sweet alert -->
    {{--<script src="{{asset('assets/js/plugins/sweetalert/sweetalert.min.js')}}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
</body>
</html>
