@extends('layouts.header')
@section('title', 'Admin')
    @section('scripts')

        <!-- Custom CSS -->
        <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('/js/metisMenu.js')}}"></script>
        <!-- Custom Theme JavaScript -->
        <script src="{{asset('/js/sb-admin-2.js')}}"></script>

    @endsection
@section('content')


<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin.index')}}">Opciones para el Administrador</a>
        </div>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Tramites<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('tramite.create')}}"><i class="fa fa-plus"></i> Crear Tramites</a>
                            </li>
                            <li>
                                <a href="{{route('tramite.index')}}">Ver Tramites</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href=""><i class="fa fa-table fa-fw"></i> Requerimientos <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('requisito.create')}}"><i class="fa fa-plus"></i> Crear Requisito</a>
                            </li>
                            <li>
                                <a href="{{route('requisito.index')}}">Ver Requisitos</a>
                            </li>
                        </ul>
                    </li><li>
                        <a href=""><i class="fa fa-table fa-fw"></i> Nro Cuenta <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('cuenta.create')}}"><i class="fa fa-plus"></i> Crear Nro de Cuenta</a>
                            </li>
                            <li>
                                <a href="{{route('cuenta.index')}}">Ver Nro de Cuentas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-table fa-fw"></i> Entidad Publica<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('entidad.create')}}"><i class="fa fa-plus"></i> Crear Entidad Publica</a>
                            </li>
                            <li>
                                <a href="{{route('entidad.index')}}">Ver Entidades Publicas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-table fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{route('users.index')}}">Ver usuarios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-table fa-fw"></i> Unidades<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{route('unidad.create')}}">Crear Unidad</a>
                                <a href="{{route('unidad.index')}}">Ver Unidades</a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        @yield('wrapper')

    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
@endsection