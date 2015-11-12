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
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Opciones para el Administrador</a>
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
                                <a href="morris.html">Ver Tramites</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Requerimientos <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href=""><i class="fa fa-plus"></i> Crear Tramites</a>
                            </li>
                            <li>
                                <a href="morris.html">Ver Tramites</a>
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