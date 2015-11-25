<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersList(){
        $r=User::all();
        return response()->json($r->toArray());
    }
    public function index()
    {
        $user=user::all();
        return view('users.index')->withUsers($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u= new user();

        $u->first_name=$request->input('first_name');
        $u->last_name=$request->input('last_name');
        $u->ci=$request->input('ci');
        $u->address=$request->input('address');
        $u->occupation=$request->input('occupation');
        $u->birthday=$request->input('birthday');
        $u->email=$request->input('email');
        $u->role='admin';
        $u->user=$request->input('user');
        $u->password=$request->input('password');
        $u->save();
        return redirect()->action('userController@index');

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
        $r=User::find($id);
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
        $r=User::find($id);
        $r->first_name=$request->first_name;
        $r->last_name=$request->last_name;
        $r->ci=$request->ci;
        $r->address=$request->address;
        $r->occupation=$request->occupation;
        $r->birthday=$request->birthday;
        $r->email=$request->email;
        $r->user=$request->user;
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
        $r=User::findOrFail($id);
        $r->delete();
        return response()->json([
            'mensaje'=>'Requisito Eliminado'
        ]);
    }
}
