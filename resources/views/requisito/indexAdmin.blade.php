@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
@endsection
@section('wrapper')

    <h1>Requisitos</h1>
    <div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se actualizo el requisito.</strong>
    </div>
    <div id="msj-successDelet" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <strong>Se Elimino el requisito.</strong>
    </div>

    <table class="table table-bordered table-hover table-striped" >
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
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
                    {!!link_to('#',$title='Actualizar',$attributes=['id'=>'update','class'=>'btn btn-primary'],$secure=null)!!}
                </div>
            </div>
        </div>
    </div>
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
            var route="http://localhost:8000/requisitoList";
            $('#datos').empty();
            $.get(route, function(res){
                $(res).each(function(key, value){
                    data.append("<tr><td>"+value.name+"</td><td>"+value.description+"</td><td><button class='btn btn-info' value="+value.id+" onclick='mostrar(this)' data-toggle='modal'  data-target='#editReq'><i class='fa fa-pencil fa-lg'></i> Editar</button><button class='btn btn-danger' value="+value.id+" onclick='beforeDelete(this)' data-toggle='modal'  data-target='#deleteReq'><i class='fa fa-trash-o fa-lg'></i> Eliminar</button></td></tr>");
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
            var route="http://localhost:8000/requisito/"+value+"";
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
            var route="http://localhost:8000/requisito/"+btn.value+"/edit";
            $.get(route, function(res){
                $('#name').val(res.name);
                $('#description').val(res.description);
                $('#id').val(res.id);
            });
        };
        $('#update').click(function(){
            var id=$('#id').val();
            console.log('udate'+id);
            var name=$('#name').val();
            var desc=$('#description').val();
            var route="http://localhost:8000/requisito/"+id+"";
            var token=$('#token').val();
            $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN' : token},
                type:'PUT',
                dataType:'json',
                data:{name:name,description:desc},
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

