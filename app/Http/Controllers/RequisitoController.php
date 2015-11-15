<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Requisito;
use Illuminate\Routing\Route;
class RequisitoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function requisitoList(){
        $r=Requisito::all();
        return response()->json($r->toArray());
    }

    public function index()
    {
        $req=Requisito::all();
        if(!auth()->guest() and auth()->user()->role=='admin' ){
            return view('requisito.indexAdmin')->with('requisitos',$req);
        }
        return view ('requisito.index',['req'=>$req]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('requisito.create');
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
            Requisito::create($request->all());
            return response()->json([
                'mensaje'=>'Añadido Correctamente'
            ]);
        }
        $r=new Requisito();
        $r->name=$request->input('name');
        $r->description=$request->input('description');
        $r->save();
        return redirect()->action('RequisitoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $r=requisito::find($id);
        return view('requisito.show',[
            'r'=>$r
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
        $r=Requisito::find($id);
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
        $r=Requisito::find($id);
        $r->name=$request->name;
        $r->description=$request->description;
        $r->save();
        return response()->json(['mensaje'=>'Listo']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $re, $id)
    {
        $r= Requisito::findOrFail($id);
        $r->delete();
        return response()->json([
            'mensaje'=>'Requisito Eliminado'
        ]);
    }
}
