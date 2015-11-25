<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EntidadPublica;
use App\Requisito;

class EntidadPublicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function entidadList(){
        $r=EntidadPublica::all();
        return response()->json($r->toArray());
    }
    public function index()
    {
        $r=EntidadPublica::all();
        return view ('entidad.index',[
            'ent'=>$r
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entidad.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $r=EntidadPublica::find($id);
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
        $r=EntidadPublica::find($id);
        $r->nombre_razonSocial=$request->nombre_razonSocial;
        $r->direccion=$request->direccion;
        $r->fono=$request->fono;
        $r->latitude=$request->latitude;
        $r->longitude=$request->longitude;
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
        $r=EntidadPublica::findOrFail($id);
        $r->delete();
        return response()->json([
            'mensaje'=>'Entidad Eliminada'
        ]);
    }
}
