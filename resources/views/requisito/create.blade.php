@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
@endsection
@section('wrapper')
    {!! Form::open(array('action'=>'RequisitoController@store','class'=>'form-horizontal')) !!}
    <h3>Datos del nuevo Requisito</h3>
    {!! Form::label('name', 'Nombre:')!!}
    {!! Form::text('name', '',array('class'=>'form-control','placeholder'=>'Nombre del Requisito'))!!}
    {!! Form::label('description', 'Descripcion:')!!}
    {!! Form::textarea('description', '',array('class'=>'form-control','placeholder'=>'Descripcion del Requisito'))!!}

    {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}


@endsection
