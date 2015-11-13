@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')

@section('content')
    <h1>Requisitos</h1>
    <div class="col-md-5">
        <ol>
            @foreach($req as $r)
                <li>
                    <a href="{{route('requisito.show', $r->id)}}" title="{{$r->description}}">{{$r->name}}</a>
                </li>
            @endforeach
        </ol>
    </div>
    <div class="col-md-3">
        <img  src="{{ asset('/image/ima.png')}}" alt="">
    </div>
@endsection