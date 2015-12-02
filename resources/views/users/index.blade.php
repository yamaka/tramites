@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>

@endsection
@section('wrapper')
    <h1>Usuarios</h1>
    <table class="table table-bordered table-hover table-striped table-responsive" >
        <thead>
        <tr>
            <th>Apellido P.</th>
            <th>Apellido M.</th>
            <th>Ci</th>
            <th>username</th>
            <th>email</th>
            <th>opciones</th>

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
                    <h4 class="modal-title" id="myModalLabel">Editar Datos del Usuario</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token"/>
                    <input type="hidden" id="id">
                    <div class="form-group">
                        {!! Form::label('first_name', 'Apellido Paterno:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('first_name', '',array('class'=>'form-control','placeholder'=>'Apellido'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('last_name', 'Apellido Materno:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('last_name', '',array('class'=>'form-control','placeholder'=>'Apellido'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('ci', 'Ci:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('ci', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Direccion:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('address', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('occupation', 'Ocupacion:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('occupation', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('birthday', 'Fecha Nac:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::date('birthday', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('email', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('user', 'Username:',array('class'=>'col-md-4 control-label'))!!}
                        <div class="col-md-6">
                            {!! Form::text('user', '',array('class'=>'form-control','placeholder'=>''))!!}
                        </div>
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
                var route="http://localhost:8000/usersList";
                $('#datos').empty();
                $.get(route, function(res){
                    $(res).each(function(key, value){
                        data.append("<tr><td>"+value.first_name+"</td><td>"+value.last_name+"</td><td>"+value.ci+"</td><td>"+value.user+"</td><td>"+value.email+"</td><td><button class='btn btn-info' value="+value.id+" onclick='mostrar(this)' data-toggle='modal'  data-target='#editReq'><i class='fa fa-pencil fa-lg'></i> Editar</button><button class='btn btn-danger' value="+value.id+" onclick='beforeDelete(this)' data-toggle='modal'  data-target='#deleteReq'><i class='fa fa-trash-o fa-lg'></i> Eliminar</button></td></tr>");
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
                var route="http://localhost:8000/users/"+value+"";
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
                var route="http://localhost:8000/users/"+btn.value+"/edit";
                $.get(route, function(res){
                    $('#first_name').val(res.first_name);
                    $('#last_name').val(res.last_name);
                    $('#ci').val(res.ci);
                    $('#address').val(res.address);
                    $('#occupation').val(res.occupation);
                    $('#birthday').val(res.birthday);
                    $('#email').val(res.email);
                    $('#user').val(res.user);

                });
            };

            $('#update').click(function(){
                var id=$('#id').val();

                var f=$('#first_name').val();
                var l=$('#last_name').val();
                var c=$('#ci').val();
                var a=$('#address').val();
                var o=$('#occupation').val();
                var b=$('#birthday').val();
                var e=$('#email').val();
                var u=$('#user').val();
                var route="http://localhost:8000/users/"+id+"";
                var token=$('#token').val();
                $.ajax({
                    url:route,
                    headers:{'X-CSRF-TOKEN' : token},
                    type:'PUT',
                    dataType:'json',
                    data:{first_name:f,last_name:l,ci:c,address:a,occupation:o,birthday:b, email:e, user:u},
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
