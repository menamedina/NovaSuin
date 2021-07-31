<link rel="stylesheet"
      href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
     integrity=
"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
     crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet"
      href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
     integrity=
"sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
      crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity=
"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
crossorigin="anonymous"></script>
<style>

    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      font-size: 12px;

    }
    /* setting the text-align property to center*/
     td {
      padding: 5px;
      /*text-align:center;*/
     /* font-size: 12px;*/

    }
    h4{
        text-align: center;
        /*font-size: 12px;*/

    }
    </style>
    <?php
    $path = 'img/logonovasuin.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <!-- ?php echo $base64?> -->
    <table  class="table table-striped table-bordered table-hover dataTables-example" >
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
            <tr>
                <td colspan="2"></td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>
                <td>a</td>

            </tr>
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
                <td colspan="7" ><center>CARGA DE RESINA MAS ADITIVO</center></td>
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
            @foreach ( $datas as $data)
                <tr class="gradeX">
                    <td>{{$data->rownum}}</td>
                    <td>{{$data->codigo}}</td>
                    <td>{{$data->referencia}}</td>
                    <td style='text-align:right; vertical-align:middle'>{{$data->formula}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <script src="{{ asset('/assets/js/bootstrap.js')}}"></script>
