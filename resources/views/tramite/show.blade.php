@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="{{asset('css/leaflet.css')}}">
    <script src="{{asset('/js/leaflet.js')}}"></script>
    <h1>Requisitos para {{$tramite->nombre}}</h1>
    <div class="col-md-5">
        <p>{{$tramite->descripcion}}</p>
            <button class='btn btn-info'  data-toggle='modal'  data-target='#editReq'><i class='fa fa-pencil fa-lg'></i> Procedimiento</button>
        <div class="modal fade" id="editReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Procedimiento Para: {{$tramite->nombre}}</h4>

                    </div>
                    <div class="modal-body">
                        <ol>
                            @foreach($pro as $p)
                                @if($p->id_tramite==$tramite->id)
                                    @foreach($pas as $pa)
                                            @if($pa->id_proc==$p->id)
                                                <li>
                                                    {{$pa->paso}}
                                                </li>

                                        @endif
                                        @endforeach
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <ol>
        @foreach($tiene_req as $tr)
            @if($tr->id_tramite==$tramite->id)
                @foreach($req as $r)
                    @if($tr->id_requisito==$r->id)
                            <li>{{$r->name}}</li>
                    @endif
                @endforeach
            @endif
        @endforeach
        </ol>
        <div class="well">
            <h4>Depositos en:</h4>
            @foreach($nro as $n)
                @if($n->id_entpub==$tramite->id_entpub)
                    Banco: {{$n->entidad_bancaria}}
                    <br>
                    Nro de Cuenta: {{$n->nro}}
                    <br>
                @endif
            @endforeach
        </div>
    </div>
    <div class="col-md-6">
        <article class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-map-marker"></i>
                Mapa
            </div>
            <div class="panel-body">
                <div id="map" style="width: auto; height: 400px"></div>
                @foreach($ent as $e)
                    @if($tramite->id_entpub==$e->id)
                <script>
                    //var coordinates = document.getElementById('coordinates');

                    var map = L.map('map').setView([{{$e->latitude}},{{$e->longitude}} ], 17);
                   //  var map = L.map('map').setView([-16.503002, -68.129139 ], 16);
                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        maxZoom: 18,
                        attribution: 'Tramites v1.0',
                        id: 'examples.map-i875mjb7'
                    }).addTo(map);
                    var marker =L.marker([{{$e->latitude}},{{$e->longitude}}]).addTo(map)
                  // var marker =L.marker([-16.503002, -68.129139]).addTo(map)
                            .bindPopup("<b>{{$e->nombre_razonSocial}}</b><br />").openPopup();
                    var popup = L.popup();
                </script>
            </div>
            <div class="panel-footer">
                Direccion: {{$e->direccion}}
                <p>Telefono: {{$e->fono}}</p>
                    @endif
                @endforeach
            </div>
        </article>
    </div>

@endsection