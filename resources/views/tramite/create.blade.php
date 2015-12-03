@extends('admin.index')
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
@section('wrapper')
    {!! Form::open(array('action'=>'TramiteController@store','class'=>'form-horizontal')) !!}
    <h3>Datos del nuevo Tramite</h3>
            {!! Form::label('nombre', 'Nombre:')!!}
            {!! Form::text('nombre', '',array('class'=>'form-control','placeholder'=>'Nombre del Tramite'))!!}
            {!! Form::label('descripcion', 'Descripcion:')!!}
            {!! Form::textarea('descripcion', '',array('class'=>'form-control','placeholder'=>'Descripcion del Tramite'))!!}
            <h3>Seleccionar requisitos para el Tramite</h3>
            <input type="hidden" id="requisitos" name="requisitos"/>
            <select name="listreq" id="listreq" data-toggle="select" multiple placeholder="Seleccione los requisitos" class="form-control multiselect multiselect-default mrs mbm">
            </select>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createReq"><i class="fa fa-plus"></i> Añadir Nuevo Requisito</button>

    <h4>Seleccionar Procedimientos para el Tramite</h4>

    <input type="hidden" id="procedimientos" name="procedimientos"/>
    <select name="listproc" id="listproc" data-toggle="select" multiple placeholder="Seleccione los procedimientos" class="form-control multiselect multiselect-default mrs mbm">
        @foreach($proc as $p)
            <option value="{{$p->id}}">{{$p->pasos}}</option>
        @endforeach
    </select>

    <h4>Seleccionar La Entidad Publica</h4>
    <select name="listEnt" id="listEnt" data-toggle="select" placeholder="Seleccione la entidad" class="form-control select select-default mrs mbm">
        @foreach($ent as $e)
            <option value="{{$e->id}}">{{$e->nombre_razonSocial}}</option>
        @endforeach
    </select>

    <br>
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
                $(function(){
                    $('#listreq').on('change', function(){
                        $('#requisitos').val($(this).val());
                    });

                });
                $(function(){
                    $('#listproc').on('change', function(){
                        $('#procedimientos').val($(this).val());
                    });

                });
            </script>

    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se Añadio un nuevo requisito.</strong>
    </div>
    <div class="modal fade" id="createReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Datos del Nuevo Requisito</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open()!!}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre:',array('class'=>'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                                {!! Form::text('name', '',array('class'=>'form-control','placeholder'=>'Nombre del Requisito'))!!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Descripcion:' ,array('class'=>'col-md-4 control-label'))!!}
                            <div class="col-md-6">
                                {!! Form::textarea('description', '',array('class'=>'form-control','placeholder'=>'Descripcion del Requisito'))!!}
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        {!!link_to('#',$title='Añadir',$attributes=['id'=>'add','class'=>'btn btn-primary'],$secure=null)!!}
                    </div>
                    {!!Form::close()!!}
                    <script>
                        $(document).ready(function (){
                            load();
                            load1();

                        });
                        function load(){

                            var data=$('#listreq');
                            var route="http://localhost:8000/requisitoList";
                            //$('#listreq').empty();
                            $.get(route, function(res){
                                $(res).each(function(key, value){
                                    data.append("<option value="+value.id+">"+value.name+"</option>");
                                });
                            });
                            $('#name').val(null);
                            $('#description').val(null);
                        }
                        $('#add').click(function(){
                            console.log('entre');
                            var name=$('#name').val();
                            var desc=$('#description').val();
                            var route="http://localhost:8000/requisito";
                            var token=$('#token').val();
                            $.ajax({
                                url:route,
                                headers:{'X-CSRF-TOKEN' : token},
                                type:'POST',
                                dataType:'json',
                                data:{name:name,description:desc},
                                success: function(){
                                    load();

                                    $('#createReq').modal('toggle');
                                    $('#msj-success').fadeIn('slow');
                                }
                            });

                        });
                    </script>
                </div>
            </div>
    </div>

@endsection
