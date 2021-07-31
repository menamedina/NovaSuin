@extends('layouts.app')

@section('content')
<script>
    function lanzadera(){
        SumarDias()
    //funcion_segunda();
    //funcion_tercera();
}

</script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Producción</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">

                <a href="{{route('produccion.index')}}">Producción</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Crear Orden de Produccón</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="row">
    <div class="card col-md-8">


        <div class="card-body">
            <table  class="table table-bordered">

            </table>
        </div>
    </div>
</div>

<!-- pt-->
<div class="wrapper wrapper-content animated fadeInRight">
    <form action="{{route('produccion.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Registro Orden de Produccón <small></small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
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
                        <div class="row">
                            <div class="col-sm-3 b-r">
                                    <div class="form-group">
                                        <label>Referencia</label>

                                        <input type="text" name="referencia" value="{{$referecias[0]->referencia}}" placeholder="Enter email" class="form-control" readonly>
                                    </div>
                                    <div>
                                    </div>
                            </div>
                            <div class="col-sm-2 b-r">
                                <div class="form-group">
                                    <label>Código</label>
                                    <input type="text"  name="codigo" value="{{$referecias[0]->codigo}}" placeholder="Enter email" class="form-control" readonly>

                                </div>
                            </div>
                            <div class="col-sm-1 b-r">
                                <div class="form-group"><label class="text-center">Equipo</label>
                                    {{--<input type="text"  class="form-control">--}}
                                    <select class="form-control m-b" name="equipo">
                                        <option value=""></option>
                                        @foreach($equipos as $equipo)
                                            <option value="{{$equipo->codigo}}">{{$equipo->codigo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-1 b-r">
                                <div class="form-group"><label>Cantidad</label>
                                    <input type="text" id="cantidad" name="cantidad[]" class="form-control " oninput="calculate();" /></div>
                            </div>
                            <div class="col-sm-1 b-r">
                                <div class="form-group"><label>Lote</label>
                                    <input type="text" name="lote" class="form-control"></div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group"><label>Status</label>
                                    <br>{{--<label class="text text-success"><b>Abierta<b></label>--}}
                                        <span class="badge badge-primary">Abierta</span>
                                    <input type="hidden" name="status" value="Abierta" class="form-control text-primary" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script>
    // defino globales
 var cantidad , v_unitario, v_parcial = [];

// helper
function addEventHandler(elem, eventType, handler) {
    if (elem.addEventListener)
        elem.addEventListener (eventType, handler, false);
    else if (elem.attachEvent)
        elem.attachEvent ('on' + eventType, handler);
}

// on load
addEventHandler(document, 'DOMContentLoaded', function() {
    //Obtengo todos los campos con el nombre cantidad[]
    cantidad = document.getElementsByName("cantidad[]");
    v_unitario = document.getElementsByName("v_unitario[]");

    //console.log(cantidad , v_unitario, v_parcial);

    for(var i=0;i<cantidad.length;i++){
      addEventHandler(cantidad[i], 'change', function() {
        calculaCantidad();
      });
      addEventHandler(v_unitario[i], 'change', function() {
        calculaCantidad();
      });
    }
});
    function calculaCantidad()
{
    //Obtengo todos los campos con el nombre cantidad[]
    cantidad = document.getElementsByName("cantidad[]");
    v_unitario = document.getElementsByName("v_unitario[]");
    v_parcial = document.getElementsByName("v_parcial[]");

    //Creo el arreglo donde almaceno sus valores
    var cant = [];
    var unit = [];
    var parc = [];
    //Recorro todos los nodos que encontre que coinciden con ese nombre
    for(var i=0;i<cantidad.length;i++){
        //Añado el valor que contienen los campos
        cant.push(cantidad[i].value);
        unit.push(v_unitario[i].value);
        parc[i] = cant[i]*unit[i];

        v_parcial[i].value = cantidad[i].value * v_unitario[i].value;
    }
}
</script>
<style>
calculaCantidad();
input {
background:#fe0;
max-width:320px!important;
}
tbody {
background:#fafafa;
}

</style>
<table>
    <tbody>

            <tr>
                <input type="hidden" name="id_detalle[]" value="">
                <td><input style=" width : 60px; border: none " type="number" name="cantidad[]" id="cantidad" value="1"></td>
                <td><input style=" width : 500px; border: none " type="text" readonly name="descripcion[]" id="descripcion[]" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" step="0.01" name="v_unitario[]" id="v_unitario" value="5"></td>
                <td><input style=" width : 90px; border: none " type="number" readonly id="v_parcial" name="v_parcial[]" value=""></td>
            </tr>

            <tr>
                <input type="hidden" name="id_detalle[]" value="">
                <td><input style=" width : 60px; border: none " type="number" name="cantidad[]" id="cantidad" value=""></td>
                <td><input style=" width : 500px; border: none " type="text" readonly name="descripcion[]" id="descripcion[]" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" step="0.01" name="v_unitario[]" id="v_unitario" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" readonly id="v_parcial" name="v_parcial[]" value=""></td>
            </tr>
            <tr>
                <input type="hidden" name="id_detalle[]" value="">
                <td><input style=" width : 60px; border: none " type="number" name="cantidad[]" id="cantidad" value=""></td>
                <td><input style=" width : 500px; border: none " type="text" readonly name="descripcion[]" id="descripcion[]" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" step="0.01" name="v_unitario[]" id="v_unitario" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" readonly id="v_parcial" name="v_parcial[]" value=""></td>
            </tr>
            <tr>
                <input type="hidden" name="id_detalle[]" value="">
                <td><input style=" width : 60px; border: none " type="number" name="cantidad[]" id="cantidad" value=""></td>
                <td><input style=" width : 500px; border: none " type="text" readonly name="descripcion[]" id="descripcion[]" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" step="0.01" name="v_unitario[]" id="v_unitario" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" readonly id="v_parcial" name="v_parcial[]" value=""></td>
            </tr>
            <tr>
                <input type="hidden" name="id_detalle[]" value="">
                <td><input style=" width : 60px; border: none " type="number" name="cantidad[]" id="cantidad" value=""></td>
                <td><input style=" width : 500px; border: none " type="text" readonly name="descripcion[]" id="descripcion[]" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" step="0.01" name="v_unitario[]" id="v_unitario" value=""></td>
                <td><input style=" width : 90px; border: none " type="number" readonly id="v_parcial" name="v_parcial[]" value=""></td>
            </tr>

    </tbody>
    </table>

        <table width="80%" border="0">
            <tr>
              <th>Box 1</th>
              <th>Box 2</th>
              <th>Result</th>
            </tr>
            <tr>
             {{-- <td><input id="cantidad" type="text" oninput="calculate();" /></td>--}}
              <td><input id="box[]" type="text" value="5" oninput="calculate();" /></td>
              <td><input id="result" /></td>
            </tr>
            <tr>
              <td><td><input id="box[]" type="text" value="5" oninput="calculate();" /></td></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
          <script>


              function calculate() {
                  var myBox1 = document.getElementById('cantidad').value;
                  var myBox2 = document.getElementById('box[]').value;
                  var result = document.getElementById('result');
                  var myResult = myBox1 * myBox2;
                    document.getElementById('result').value = myResult;

              }
          </script>
        <!-- LISTA MATERIALES-->
        <div class="row">
            <div class="col-lg-8">
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
                                    <th>KG Carga</th>
                                    <th>Lote</th>
                                    <th>Operador</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $listaMateriales as $listaMaterial)
                                    <tr class="gradeX">
                                        <th>{{$listaMaterial->rownum}}</th>
                                        <th>{{$codigo=$listaMaterial->codigo}}<input type="hidden"  name="codigoLM[]" value="{{$codigo}}"></th>
                                        <th>{{$referencia=$listaMaterial->referencia}}<input type="hidden" name="referenciaLM[]" value="{{$referencia}}"></th>
                                        <td>{{$formula=$listaMaterial->formula}}<input type="hidden" class="inputDias inputKg" id="KGFormula[]" name="KGFormula[]" value="{{$formula}}" ></td>
                                        <td><input type="text" name="carga[]" value="41"  class=" inputKg  form-control form-control-sm" autocomplete="off"></td>
                                        <td><input type="text" name="loteLM[]" value=""  class="form-control form-control-sm" autocomplete="off"></td>
                                        <td><input type="text" name="operador[]"  value=""  class="form-control form-control-sm" autocomplete="off"></td>
                                       <td><input type="hidden" class="monto totalDias totalKg" value="0" ></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td>Total Dias</td>
                                    <td><input type="text" class="col-sm-7 monto totalesDias" value="0" disabled></td>
                                    <th>Total <span class="text-info"></span></th>
                                    <td><input type="text" class="col-sm-7 monto totalesKg" value="0" disabled></td>
                                </tr>
                                </tbody>

                            </table>
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Registrar</strong></button>
                                {{--@isset($listaMaterial)
                                    <a href="{{route('datosMaestros.edit',$listaMaterial->idCodigo)}}" class="btn btn-primary">Registar</a>
                                @endisset--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>




    // calculo de peso
        // generamos un evento click y keyup para cada elemento input con la clase .input

        var input=document.querySelectorAll(".inputKg");
        input.forEach(function(e) {
            e.addEventListener("click",multiplicaKg);
            e.addEventListener("keyup",multiplicaKg);
        });
        // funcion que genera la multiplicacion
        function multiplicaKg() {
            // nos posicionamos en el tr del producto
            var tr=this.closest("tr");
            var totalKg=1;
            // recorremos todos los elementos del tr que tienen la clase .input
            var inputs=tr.querySelectorAll(".inputKg");
            inputs.forEach(function(e) {
                totalKg*=e.value;
            });
            // mostramos el totalKg con dos decimales
            tr.querySelector(".totalKg").value=totalKg.toFixed(3); //   /1000
            // indicamos que calcule el
            calcularTotalKg(this.closest("table"));
        }
        // funcion que calcula la suma totalKg de los productos
        function calcularTotalKg(e) {
            var totalKg=0;
            // obtenemos todos los totales y los sumamos
            var totalesKg=e.querySelectorAll(".totalKg");
            totalesKg.forEach(function(e) {
                totalKg+=parseFloat(e.value);
            });
            // mostramos la suma totalKg con dos decimales
            e.getElementsByClassName("totalesKg")[0].value=totalKg.toFixed(3);
        }
    </script>

    <script>

        // calculo de dias
        // generamos un evento click y keyup para cada elemento input con la clase .input
        var input=document.querySelectorAll(".inputDias");
        input.forEach(function(d) {
            d.addEventListener("click",SumarDias);
            d.addEventListener("keyup",SumarDias);
        });
        // funcion que genera la multiplicacion
        function SumarDias() {
        // nos posicionamos en el tr del producto
        var tr=this.closest("tr");
        var totalDias=1;
        // recorremos todos los elementos del tr que tienen la clase .input
        var inputs=tr.querySelectorAll(".inputDias");
        inputs.forEach(function(d) {
            totalDias*=d.value;
        });
        // mostramos el total con dos decimales
        tr.querySelector(".inputDias").value=totalDias.toFixed(3);
        // indicamos que calcule el
        calcularTotalDias(this.closest("table"));
        }
        // funcion que calcula la suma total de los productos
        function calcularTotalDias(d) {
            var totalDias=0;
        // obtenemos todos los totales y los sumamos
        var totalesDias=d.querySelectorAll(".inputDias");
            totalesDias.forEach(function(d) {
                totalDias+=parseFloat(d.value);
        });
        // mostramos la suma total con dos decimales
        d.getElementsByClassName("totalesDias")[0].value=totalDias.toFixed(3);
        }

</script>


@endsection
@section('Datatables')
<script src="{asset('/assets/script/tabla-simple.js')}}"></script>
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


