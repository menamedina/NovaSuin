<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDatosMaestros;
use App\Models\ModelEspecificaciones;
use App\Models\ModelListaMateriales;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class DatosMaestrosController extends Controller
{
    public function index()
    {
        //
        $datosmaestros =ModelDatosMaestros::select('*')
        ->orderBy('id','desc')
        ->get();
        #return $datosmaestros;
        return view('datosMaestros.index',[
            'datosmaestros' => $datosmaestros
        ]);
    }
    public function create()
    {
        //

        return view('datosMaestros.create',[
            //'datosmaestros' => $datosmaestros
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'codigo'    => 'required',
            'referencia'    => 'required',
            'grupo'    => 'required',

        ],[
            'codigo.required'    => 'El Código no puede uedar vacio',
            'referencia.required'    => 'La referencia no puede uedar vacia',
        ]);

        $codigoExiste = ModelDatosMaestros::where('codigo', $request->codigo)
        ->get();
        if ($codigoExiste->isNotEmpty()) {
          //  return $codigoExiste;
            return back()->withInput()->with('error','codigoExiste');
        }

       // return "no entro";
        $datomaestros= ModelDatosMaestros::create([
            'codigo'     =>strtoupper($request->codigo),
            'userId'     => Auth::user()->id,
            'grupo' => $request->grupo,
            'referencia' => strtoupper($request->referencia),
            'comentario' => $request->comentario
          ]);

/*
          DB::statement("
          UPDATE datosmaestros
          SET etapa = '".$evento->nuevaEtapa."', peso='".$evento->peso."'
          WHERE tag ='".$evento->idCerdo ."' and idEmpresa='" .Auth::user()->idEmpresa."'
          ");*/
          DB::statement("
          INSERT INTO `especificaciones` ( `idCodigo`, `especificacion`, `valor`, `metodo`, `created_at`, `updated_at`) VALUES
          ('".strtoupper($request->codigo)."', 'Viscocidad Bookfield', '1200 - 1600', 'IQ-010', NULL, NULL),
          ('".strtoupper($request->codigo)."', 'Tiempo de Gel', '7 - 9', 'IQ-012', NULL, NULL),
          ('".strtoupper($request->codigo)."', 'Exotermia', '150 -190', 'IQ-012', NULL, NULL),
          ('".strtoupper($request->codigo)."', 'Tixotropia', '5,0  - 6,0', 'IQ-011', NULL, NULL),
          ('".strtoupper($request->codigo)."', 'Color', 'AZUL', 'N/A', NULL, NULL),
          ( '".strtoupper($request->codigo)."', '% Sodio', '58 -68', 'IQ-013', NULL, NULL)
          ");
          return redirect()->route('datosMaestros.index')->with('Guardado','Ok');
    }
    public function show($id){
        DB::statement(DB::raw('SET @rownum = 0'));
        DB::statement(DB::raw('SET @rownum1 = 0'));
        //  return "Aqui se muestran mas eventos";
        $datosMaestros =ModelDatosMaestros::find($id);
        $especificaciones =DB::table('especificaciones')
            ->select('*',DB::raw('@rownum := @rownum + 1 as rownum'))
            ->where('idCodigo',$datosMaestros->codigo)
            ->get();
        $listaMateriales =DB::table('listamateriales')
            ->select('*',DB::raw('@rownum1 := @rownum1 + 1 as rownum'))
            ->where('idCodigo',$datosMaestros->codigo)
            ->get();

            #return $especificaciones;
        return view('datosMaestros.show',[
            'datosMaestros' => $datosMaestros,
            'especificaciones' => $especificaciones,
            'listaMateriales' => $listaMateriales,
        ]);
      }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function generatePDF()
    {
        /*$data = [
                'title' => 'Welcome to ItSolutionStuff.com',
                'date' => date('m/d/Y')
            ];

            $pdf = PDF::loadView('datosMaestros.myPDF', $data);
        */
        DB::statement(DB::raw('SET @rownum = 0'));
        $especificaciones =DB::table('especificaciones')
        ->select('*')
        ->get();
        DB::statement(DB::raw('SET @rownum = 0'));
        $datas =DB::table('listamateriales')
        ->select('*',DB::raw('@rownum := @rownum + 1 as rownum'))
        //->where('idCodigo',$datosMaestros->codigo)
        ->get();

        //$pdf = PDF::loadView('datosMaestros.myPDF',compact('datas'))->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('datosMaestros.myPDF',[
            'datas' =>$datas,
            'especificaciones' =>$especificaciones
        ])->setOptions(['defaultFont' => 'sans-serif']);
        //return $pdf->setPaper('a4', 'landscape')->stream();
        return $pdf->stream();
        //$pdf = PDF::loadView('welcome');
        //return $pdf->setPaper('a4', 'landscape')->stream();

        /*#para guardar pdf
        $datas = ModelListaMateriales::all();
        $pdf = PDF::loadView('datosMaestros.myPDF',compact('datas'))->setOptions(['defaultFont' => 'sans-serif']);
        Storage::disk('public')->put(date('Y-m-d-H-i-s').'pruebaPDF',$pdf);*/

        //return redirect()->back()->with('status','pDF guardado')


        //return $pdf->download('datosMaestros.pdf');
    }



    public function validarCodigo ($codigo){
        #return $email;
        //$correo = Registros::where($email, '=>', 'email');
        $codigo = ModelDatosMaestros::where('codigo', $codigo)->first();
                /*$codigo = DB::table('datosmaestors')
                ->select('codigo')
                ->where('codigo', $codigo)
                ->first();*/
                  //if ($correo == 'email'){
                if ($codigo->isNotEmpty()) {
                    return response()->json(['error'=>'La identificación ya existe'],422);
                }else{
                    return response()->json(['success'=>'La identificación no existe'],200);
                }
    }
}
