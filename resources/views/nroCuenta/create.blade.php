@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
@endsection
@section('wrapper')
    {!! Form::open(array('action'=>'NroCuentaController@store','class'=>'form-horizontal')) !!}
    <h3>Datos del Nro de Cuenta</h3>
    {!! Form::label('banco', 'Banco:')!!}
    {!! Form::text('banco', '',array('class'=>'form-control','placeholder'=>'Descripcion del Requisito'))!!}
    {!! Form::label('nro', 'Nro:')!!}
    {!! Form::text('nro', '',array('class'=>'form-control','placeholder'=>'Nro de Cuenta'))!!}
    <br/>
    <select name="entpub" data-toggle="select" class="form-control select select-default mrs mbm">
    @foreach($ent as $e)
            <option value="{{$e->id}}">{{$e->nombre_razonSocial}}</option>
    @endforeach
    </select>
    {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}


@endsection
