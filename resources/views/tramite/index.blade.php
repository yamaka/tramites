@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')
    
@section('content')
    <h1>Tramites</h1>
    <ol>
    @foreach($tramites as $t)
        <li>
            <a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">{{$t->nombre}}</a>
        </li>
    @endforeach
    </ol>
@endsection