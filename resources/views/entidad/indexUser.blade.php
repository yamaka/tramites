@extends('layouts.header')
@section('title', 'Tramites')
@section('activeEnt','active')

@section('content')
    <h1>Entidades</h1>
    <div class="col-md-5">
        <ol>
            @foreach($ent as $t)
                <li>
                    <a href={{route('entidad.show', $t->id)}}>{{$t->nombre_razonSocial}}</a>

                </li>
            @endforeach
        </ol>
    </div>

@endsection