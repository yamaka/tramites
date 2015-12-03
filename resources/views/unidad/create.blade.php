@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
@endsection
@endsection
@section('wrapper')
    {!! Form::open(array('action'=>'UnidadController@store','class'=>'form-horizontal')) !!}
    <h3>Datos de la Unidad</h3>
    {!! Form::label('nombre', 'Nombre de la Unidad:')!!}
    {!! Form::text('nombre', '',array('class'=>'form-control','placeholder'=>'Nombre de la unidad'))!!}
    {!! Form::label('autoridad', 'Autoridad:')!!}
    {!! Form::text('autoridad', '',array('class'=>'form-control','placeholder'=>'Autoridad'))!!}

    <h4>Seleccionar La Entidad Publica</h4>
    <select name="listEnt" id="listEnt" data-toggle="select" placeholder="Seleccione la entidad" class="form-control select select-default mrs mbm">
        @foreach($ent as $e)
            <option value="{{$e->id}}">{{$e->nombre_razonSocial}}</option>
        @endforeach
    </select>
    <script>

    </script>
    {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}


@endsection
