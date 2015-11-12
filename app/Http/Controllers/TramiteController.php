<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Requisito;
use App\tramites;
use App\TieneRequisito;
use App\EntidadPublica;
class TramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t=tramites::all();
        return view('tramite.index',[
            'tramites'=>$t
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->guest()and auth()->id()==12){
            return view('tramite.create');
        }else{
            return redirect()->route('home');
        }

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
        return redirect()->action('TramiteController@index');;
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
        return view('tramite.show',[
            'tramite'=>$t,
            'req'=>$r,
            'tiene_req'=>$tr,
            'ent'=>$e
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
        //
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
        //
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
