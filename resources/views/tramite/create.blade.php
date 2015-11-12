@extends('layouts.header')
@section('title', 'Admin')
@section('scripts')

    <!-- Custom CSS -->
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/leaflet.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('/js/leaflet.js')}}"></script>

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
                                    <a href=""><i class="fa fa-plus"></i> Crear Tramites</a>
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
            {!! Form::open(array('action'=>'TramiteController@store','class'=>'form-horizontal')) !!}
            <h3>Datos del nuevo Tramite</h3>
            {!! Form::label('nombre', 'Nombre:')!!}
            {!! Form::text('nombre', '',array('class'=>'form-control','placeholder'=>'Nombre del Tramite'))!!}
            {!! Form::label('descripcion', 'Descripcion:')!!}
            {!! Form::textarea('descripcion', '',array('class'=>'form-control','placeholder'=>'Descripcion del Tramite'))!!}
            {!! Form::label('posi','Ubicacion:')!!}
            <h3>Datos de la Entidad</h3>
            {!! Form::label('nombre_razonSocial', 'Nombre Entidad:')!!}
            {!! Form::text('nombre_razonSocial', '',array('class'=>'form-control','placeholder'=>'Nombre de la entidad'))!!}
            {!! Form::label('direccion', 'Direccion:')!!}
            {!! Form::text('direccion', '',array('class'=>'form-control','placeholder'=>'Dirección'))!!}
            {!! Form::label('fono', 'Telefono:')!!}
            {!! Form::text('fono', '',array('class'=>'form-control','placeholder'=>'Telefono'))!!}
            {!! Form::label('ubicacion', 'Ubicación en el Mapa:')!!}
            <div id="map" style="width: 600px; height: 400px"></div>
            {!! Form::input('hidden','lat','',array('id'=>'lat','class'=>'form-control')) !!}
            {!! Form::input('hidden','lng','',array('id'=>'lng','class'=>'form-control')) !!}
            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
            {!! Form::close() !!}
            <script>
                var map = L.map('map').setView([-16.504195744555755, -68.12928915023804], 17);
                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    id: 'examples.map-i875mjb7'
                }).addTo(map);

                var marker =L.marker([-16.504195744555755, -68.12928915023804],{draggable: true}).addTo(map)
                        .bindPopup("<b>Mueveme!</b><br />A la direccion de la Entidad Publica.").openPopup();

                var popup = L.popup();

                //map.on('click', onMapClick);
                marker.on('dragend', ondragend);
                // Set the initial marker coordinate on load.
                ondragend();
                function ondragend() {
                    var m = marker.getLatLng();
                    //coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;
                    document.getElementById('lat').value=(m.lat);
                    document.getElementById('lng').value=(m.lng);
                }
            </script>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
@endsection
