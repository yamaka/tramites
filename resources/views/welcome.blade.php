@extends('layouts.header')
@section('title','Inicio')
@section('content')
<p style="font-size:269%">Bienvenido</p>
    <p>desea relalizar algun tramite</p>
    <div class="col-md-5">
        estamos siempre a su servicio para facilitar su tramite
        <img src="{{ asset('/image/licencia.jpg') }}" width="80%" alt="">
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <img  src="{{ asset('/image/ima.png')}}" alt="">
    </div>
@endsection
