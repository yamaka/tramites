<?php

namespace App\Http\Controllers;

use App\EntidadPublica;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\NroCuenta;
class NroCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cuentaList(){
        $r=NroCuenta::all();
        return response()->json($r->toArray());
    }
    public function index()
    {
        $n=NroCuenta::all();
        return view('NroCuenta.index',[
            'cuenta'=>$n
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $e=EntidadPublica::all();
        return view('NroCuenta.create',[
            'ent'=>$e
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){

        }
        $r=new NroCuenta();
        $r->entidad_bancaria=$request->input('banco');
        $r->nro=$request->input('nro');
        $r->id_entpub=$request->input('entpub');
        $r->save();
        return redirect()->action('NroCuentaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $r=NroCuenta::find($id);
        return response()->json($r->toArray());
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
        $r=NroCuenta::find($id);
        $r->entidad_bancaria=$request->entidad_bancaria;
        $r->nro=$request->nro;
        $r->save();
        return response()->json(['mensaje'=>'Listo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $r=NroCuenta::findOrFail($id);
        $r->delete();
        return response()->json([
            'mensaje'=>'Requisito Eliminado'
        ]);
    }
}
