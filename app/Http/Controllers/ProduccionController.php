<?php

namespace App\Http\Controllers;

use App\Models\ModelDatosMaestros;
use App\Models\ModelEquipos;
use App\Models\ModelProduccion;
use App\Models\ModelProduccionD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class ProduccionController extends Controller
{

    public function index()
    {
        //



        $ordenProducciones = ModelProduccion::select('*')//where('codigo', $codigo)
        ->get();
        return view('produccion.index',[
            'ordenProducciones' => $ordenProducciones
        ]);
    }


    public function create($codigo)
    {
        //
        DB::statement(DB::raw('SET @rownum = 0'));
        $referecias = ModelDatosMaestros::where('codigo', $codigo)
        ->get();
        DB::statement(DB::raw('SET @rownum = 0'));
        $listaMateriales =DB::table('listamateriales')
        ->select('*',DB::raw('@rownum := @rownum + 1 as rownum'))
        ->where('idCodigo',$codigo)
        ->get();

        #MEZCLADOR
        $equipos = DB::table('equipos')
        ->get();
        //return $referecias;
        return view('produccion.create',[
            'referecias' => $referecias,
            'listaMateriales' =>$listaMateriales,
            'equipos' =>$equipos
        ]);
    }


    public function store(Request $request)
    {
        //
        $ordenes = new ModelProduccion();
        $ordenes->codigo = $request->codigo;
        $ordenes->referencia = $request->referencia;
        $ordenes->equipo = $request->equipo;
        $ordenes->cantidad = $request->cantidad;
        $ordenes->lote = $request->lote;
        $ordenes->status = $request->status;
        $ordenes->userId = Auth::user()->id;
        $ordenes->save();
        $ultimo = ModelProduccion::latest()->first();
        $registros = count($request->loteLM);
        $cont = 0;
       #return $request;
        while($cont<$registros){
            $ordenesD = new ModelProduccionD();
            $ordenesD->OP_id = $ultimo->id;
            $ordenesD->codigo = $request->codigoLM[$cont];
            $ordenesD->materiaPrima = $request->referenciaLM[$cont];
            $ordenesD->KGFormula = $request->KGFormula[$cont];
            $ordenesD->KGCarga = $request->carga[$cont];
            $ordenesD->lote = $request->loteLM[$cont];
            $ordenesD->operador = $request->operador[$cont];
            //$ordenesD->operador = $request->operador[$cont];
            $ordenesD->userId = Auth::user()->id;
            $ordenesD->save();
            $cont++;
           }
#    return $cont;
        return redirect()->route('produccion.index')->with('Guardado','Ok');
    }
    public function pdfOP($id)
    {
        /*$data = [
                'title' => 'Welcome to ItSolutionStuff.com',
                'date' => date('m/d/Y')
            ];
            $pdf = PDF::loadView('datosMaestros.myPDF', $data);
        */
        #orden de produccion
        $ordenProducciones =DB::table('ordenproduccion')
        ->select('*')
        ->where('id',$id)
        ->get();
        //return $ordenProducciones[0]->id;
        DB::statement(DB::raw('SET @rownum = 0'));
        $ordenProduccionesD =DB::table('ordenproduccionD')
        ->select('*',DB::raw('@rownum := @rownum + 1 as rownum'))
        ->where('OP_id',$ordenProducciones[0]->id)
        ->get();
       //return $ordenProduccionesD;
        $especificaciones =DB::table('especificaciones')
        ->select('*')
        ->get();
        /*
            #visualizar

            $pdf = PDF::loadView('produccion.pdfOP',[
            'ordenProduccionesD' =>$ordenProduccionesD,
            'especificaciones' =>$especificaciones,
            'ordenProducciones' =>$ordenProducciones
            ])->setOptions(['defaultFont' => 'sans-serif']);
        */
        $pdf = PDF::loadView('produccion.pdfOP',
        [
            'ordenProduccionesD' =>$ordenProduccionesD,
            'especificaciones' =>$especificaciones,
            'ordenProducciones' =>$ordenProducciones
        ])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->setPaper('legal')->stream();

    }
    public function mailOP($id)
    {

        #orden de produccion
        $ordenProducciones =DB::table('ordenproduccion')
        ->select('*')
        ->where('id',$id)
        ->get();
        //return $ordenProducciones[0]->id;
        DB::statement(DB::raw('SET @rownum = 0'));
        $ordenProduccionesD =DB::table('ordenproduccionD')
        ->select('*',DB::raw('@rownum := @rownum + 1 as rownum'))
        ->where('OP_id',$ordenProducciones[0]->id)
        ->get();
       //return $ordenProduccionesD;
        $especificaciones =DB::table('especificaciones')
        ->select('*')
        ->get();
        $data["email"] = "facturacion@quimicaorion.com.co";
        $data["title"] = "Certificado de Calidad Quimica Orión";
        $data["body"] = "Mensaje enviado desde Intranet .";
        $pdf = PDF::loadView('produccion.pdfOP',
        [
            'ordenProduccionesD' =>$ordenProduccionesD,
            'especificaciones' =>$especificaciones,
            'ordenProducciones' =>$ordenProducciones
        ])->setOptions(['defaultFont' => 'sans-serif']);
        Mail::send('mail.sendMail',
        /*[
            'ordenProduccionesD' =>$ordenProduccionesD,
            'especificaciones' =>$especificaciones,
            'ordenProducciones' =>$ordenProducciones
        ],*/
        $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"]) //, $data["email"] estaba 2 veces
                ->subject($data["title"])
                ->attachData($pdf->output(), "test.pdf");
        });
        return redirect()->route('produccion.index')->with('mailEnviado','Ok');
    }
    public function show($id)
    {
        //
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
}
