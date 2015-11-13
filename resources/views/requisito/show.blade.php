@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')

@section('content')
    <h1>Requisito {{$r->name}}</h1>
    <div class="col-md-5">
        <p>{{$r->description}}</p>
    </div>
    <div class="col-md-3">
        <img  src="{{ asset('/image/ima.png')}}" alt="">
    </div>
@endsection