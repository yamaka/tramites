@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
    <link href="{{asset('/css/leaflet.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/leaflet.js')}}"></script>
@endsection
@endsection
@section('wrapper')
    {!! Form::open(array('action'=>'EntidadPublicaController@store','class'=>'form-horizontal')) !!}
    <h3>Datos de la Entidad Publica</h3>
    {!! Form::label('nombre_razonSocial', 'Nombre Entidad:')!!}
    {!! Form::text('nombre_razonSocial', '',array('class'=>'form-control','placeholder'=>'Nombre de la entidad'))!!}
    {!! Form::label('direccion', 'Direccion:')!!}
    {!! Form::text('direccion', '',array('class'=>'form-control','placeholder'=>'Dirección'))!!}
    {!! Form::label('fono', 'Telefono:')!!}
    {!! Form::text('fono', '',array('class'=>'form-control','placeholder'=>'Telefono'))!!}
    {!! Form::input('hidden','lat','',array('id'=>'lat','class'=>'form-control')) !!}
    {!! Form::input('hidden','lng','',array('id'=>'lng','class'=>'form-control')) !!}
    {!! Form::label('ubicacion', 'Ubicación en el Mapa:')!!}
    <div id="map" style="width: 600px; height: 400px"></div>
    {!! Form::label('banco', 'Banco:')!!}
    {!! Form::text('banco', '',array('class'=>'form-control','placeholder'=>'Entidad Bancaria'))!!}
    {!! Form::label('nroCuenta', 'Nro Cuenta:')!!}
    {!! Form::text('nroCuenta', '',array('class'=>'form-control','placeholder'=>'Nro Cuenta'))!!}

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
        $(function(){
            $('#listreq').on('change', function(){
                $('#requisitos').val($(this).val());
            });

        });
    </script>
    {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
    {!! Form::close() !!}


@endsection
