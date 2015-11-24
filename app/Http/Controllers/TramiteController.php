<?php

namespace App\Http\Controllers;

use App\NroCuenta;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Requisito;
use App\tramites;
use App\TieneRequisito;
use App\EntidadPublica;
use DB;
use App\seguimientoTramite;

class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tramiteList()
    {
        $t=Tramites::all();
        return response()->json($t->toArray());


    }

    public function index()
    {

        $t=tramites::all();
        $s=seguimientoTramite::all();
        if(!auth()->guest() and auth()->user()->role=='admin' ){
            return view('tramite.indexAdmin')->with('tramites',$t);
        }
        return view('tramite.index',[
            'tramites'=>$t,
            'seguimiento'=>$s,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $r=Requisito::all();
        return view('tramite.create')->withrequ($r);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $e=new EntidadPublica();
        $e->nombre_razonSocial=$request->input('nombre_razonSocial');
        $e->direccion=$request->input('direccion');
        $e->fono=$request->input('fono');
        $e->latitude=$request->input('lat');
        $e->longitude=$request->input('lng');
        $e->save();
        $t=new Tramites();
        $t->nombre=$request->input('nombre');
        $t->descripcion=$request->input('descripcion');
        $t->id_entpub=$e->id;
        $t->save();

        foreach(array_unique(explode(',', $request->input('requisitos'))) as $req_id){
          DB::table('tiene_requisitos')->insert(
                [
                    'id_tramite' => $t->id,
                    'id_requisito' => $req_id
                ]
            );
        }

        return redirect()->action('TramiteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t=tramites::find($id);
        $r=requisito::all();
        $tr=tienerequisito::all();
        $e=entidadPublica::all();
        $n=NroCuenta::all();
        return view('tramite.show',[
            'tramite'=>$t,
            'req'=>$r,
            'tiene_req'=>$tr,
            'ent'=>$e,
            'nro'=>$n
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $t=Tramites::find($id);
        return response()->json($t->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t=Tramites::find($id);
        var_dump($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
