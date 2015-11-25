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
@section('wrapper')
    <h1>Entidades Publica</h1>
    <table class="table table-bordered table-hover table-striped" >
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Telofono</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody id="datos">

        </tbody>
    </table>
    <div class="modal fade" id="editReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Datos del Requisito</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
                    <input type="hidden" id="id">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('nombre', '',array('class'=>'form-control','placeholder'=>'Nombre de la Entidad'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('direccion', 'Direccion:' ,array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('direccion', '',array('class'=>'form-control','placeholder'=>'Direccion de la entidad'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('fono', 'Telefono:' ,array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('fono', '',array('class'=>'form-control','placeholder'=>'Telefono'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Ubicacion', 'Ubicacion:' ,array('class'=>'col-md-4 control-label'))!!}
                        <div id="map" style="width: 500px; height: 400px"></div>
                        {!! Form::input('hidden','lat','',array('id'=>'lat','class'=>'form-control')) !!}
                        {!! Form::input('hidden','lng','',array('id'=>'lng','class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    {!!link_to('#',$title='Actualizar',$attributes=['id'=>'update','class'=>'btn btn-primary'],$secure=null)!!}
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <div class="modal fade" id="deleteReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Esta Seguro de Eliminar este Requisito</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
                    <input type="hidden" id="id">
                    <div class="form-group">
                        {!! Form::open() !!}
                        {!!link_to('#',$title='No',$attributes=['id'=>'no','class'=>'btn btn-danger'],$secure=null)!!}
                        {!!link_to('#',$title='Si',$attributes=['id'=>'yes','class'=>'btn btn-success'],$secure=null)!!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                load();
            });
            function load(){
                var data=$('#datos');
                var route="http://localhost:8000/entidadList";
                $('#datos').empty();
                $.get(route, function(res){
                    $(res).each(function(key, value){
                        data.append("<tr><td>"+value.nombre_razonSocial+"</td><td>"+value.direccion+"</td><td>"+value.fono+"</td><td><button class='btn btn-info' value="+value.id+" onclick='mostrar(this)' data-toggle='modal'  data-target='#editReq'><i class='fa fa-pencil fa-lg'></i> Editar</button><button class='btn btn-danger' value="+value.id+" onclick='beforeDelete(this)' data-toggle='modal'  data-target='#deleteReq'><i class='fa fa-trash-o fa-lg'></i> Eliminar</button></td></tr>");
                    });
                });
            };
            var idd=0;
            function beforeDelete(btn){
                idd=btn.value;
            }
            $('#yes').click(function () {
                eliminar(idd);
                idd=0;
            });
            $('#no').click(function () {
                $('#deleteReq').modal('toggle');
            });

            function eliminar(value){
                var route="http://localhost:8000/entidad/"+value+"";
                var token=$('#token').val();
                $.ajax({
                    url:route,
                    headers:{'X-CSRF-TOKEN' : token},
                    type:'DELETE',
                    dataType:'json',
                    success: function(){
                        load();
                        $('#deleteReq').modal('toggle');
                        $('#msj-successDelete').fadeIn(5000);
                        $('#msj-successDelete').slideUp(1000);
                    }
                });
            }
            function mostrar(btn){
                console.log(btn.value);
                var route="http://localhost:8000/entidad/"+btn.value+"/edit";
                $.get(route, function(res){
                    $('#nombre').val(res.nombre_razonSocial);
                    $('#direccion').val(res.direccion);
                    $('#fono').val(res.fono);
                    $('#lat').val(res.latitude);
                    $('#lng').val(res.longitude);
                    $('#id').val(res.id);

                var map = L.map('map').setView([res.latitude, res.longitude], 17);
                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                    '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    id: 'examples.map-i875mjb7'
                }).addTo(map);

                var marker =L.marker([res.latitude, res.longitude],{draggable: true}).addTo(map)
                        .bindPopup("<b>Mueveme!</b><br />A la direccion de la Entidad Publica.").openPopup();
                    function ondragend() {
                        var m = marker.getLatLng();
                        //coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;
                        document.getElementById('lat').value=(m.lat);
                        document.getElementById('lng').value=(m.lng);
                    }
                    var popup = L.popup();

                    //map.on('click', onMapClick);
                    marker.on('dragend', ondragend);
                    // Set the initial marker coordinate on load.
                    ondragend();
                });
            };

            $('#update').click(function(){
                var id=$('#id').val();
                console.log('udate'+id);
                var name=$('#nombre').val();
                var dir=$('#direccion').val();
                var fono=$('#fono').val();
                var lat=$('#lat').val();
                var lon=$('#lng').val();

                var route="http://localhost:8000/entidad/"+id+"";
                var token=$('#token').val();
                $.ajax({
                    url:route,
                    headers:{'X-CSRF-TOKEN' : token},
                    type:'PUT',
                    dataType:'json',
                    data:{nombre_razonSocial:name,direccion:dir,fono:fono, latitude:lat,longitude:lon},
                    success: function(){
                        load();
                        $('#editReq').modal('toggle');
                        $('#msj-success').fadeIn(5000);
                        $('#msj-success').slideUp(1000);
                    }
                });
            });
        </script>

@endsection
