@extends('layouts.header')
@section('title', 'Entidad '.$entidad->nombre_razonSocial)
@section('scripts')
<link rel="stylesheet" href="{{asset('css/leaflet.css')}}">
<script src="{{asset('/js/leaflet.js')}}"></script>
@endsection
@section('content')
    <h1>Entidad {{$entidad->nombre_razonSocial}}</h1>
    <div class="col-md-5">
        <h4>Tramites Disponibles</h4>
        <ol>
            @forelse($tramites as $t)
                @if($t->id_entpub==$entidad->id)
                    <li><a href="{{route('tramite.show',$t->id)}}">{{$t->nombre}}</a> </li>
                @endif
            @empty
                No Hay tramites disponibles en esta Entidad
            @endforelse
        </ol>
    </div>
    <div class="col-md-6">
        <article class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-map-marker"></i>
                Mapa
            </div>
            <div class="panel-body">
                <div id="map" style="width: auto; height: 400px"></div>
                        <script>
                            //var coordinates = document.getElementById('coordinates');
                            var map = L.map('map').setView([{{$entidad->latitude}},{{$entidad->longitude}} ], 17);
                            //  var map = L.map('map').setView([-16.503002, -68.129139 ], 16);
                            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                                maxZoom: 18,
                                attribution: 'Tramites v1.0',
                                id: 'examples.map-i875mjb7'
                            }).addTo(map);
                            var marker =L.marker([{{$entidad->latitude}},{{$entidad->longitude}}]).addTo(map)
                                // var marker =L.marker([-16.503002, -68.129139]).addTo(map)
                                    .bindPopup("<b>{{$entidad->nombre_razonSocial}}</b><br />").openPopup();
                            var popup = L.popup();
                        </script>
            </div>
            <div class="panel-footer">
                Direccion: {{$entidad->direccion}}
                <p>Telefono: {{$entidad->fono}}</p>

            </div>
        </article>
    </div>

@endsection