@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>

@endsection
@section('wrapper')
    <h1>Unidades</h1>
    <table class="table table-bordered table-hover table-striped table-responsive" >
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Autoridad</th>
        </tr>
        </thead>
        <tbody>
        @foreach($uni as $u)
            <tr>
                <td>{{$u->nombre}}</td>
                <td>{{$u->autoridad}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
