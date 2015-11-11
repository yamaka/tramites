@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')
    
@section('content')
    <h1>Tramites</h1>
    <div class="col-md-5">
    	
    <ol>
    @foreach($tramites as $t)
        <li>
            <a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">{{$t->nombre}}</a>
        </li>
    @endforeach
    </ol>
    </div>
      
    <div class="col-md-3">
        <img  src="{{ asset('/image/ima.png')}}" alt="">
    </div>
@endsection