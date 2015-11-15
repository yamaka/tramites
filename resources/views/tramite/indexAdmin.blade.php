@extends('admin.index')
@section('title', 'Admin')
@section('scripts')
    <link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/js/metisMenu.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.js')}}"></script>
@endsection
@section('wrapper')
    <h1>Tramites</h1>
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

    <script>
        $(document).ready(function(){
            var data=$('#datos');
            var route="http://localhost:8000/tramiteList";
            $.get(route, function(res){
                $(res).each(function(key, value){

                    //data.append("<tr><td><a href='{{route('tramite.index')}}/"+value.id+"'>"+value.nombre+"</td><td>"+value.descripcion+"</td><td><button class='btn btn-danger' value="+value.id+" onclick='mostrar(this)'><i class='fa fa-trash-o fa-lg'></i> Eliminar</button><button id='update'>actualizar</button></td></tr>");
                    data.append("<tr><td><a href='{{route('tramite.index')}}/"+value.id+"'>"+value.nombre+"</td><td>"+value.descripcion+"</td></tr>");
                });
            });
        });
        function mostrar(btn){
            console.log(btn.value);
            var route="http://localhost:8000/tramite/"+btn.value+"/edit";
            $.get(route, function(res){
                console.log(res.nombre);
            });
        }
        $('#update').click(function(){
            console.log('update');
           var id=$('#id').val();
           var name=$('#name').val();
            var des=$('#description').val();
            var route='http://localhost:8000/tramite/'+id;
            var token=$('#token').val();
            $.ajax({
                url:route,
                headers:{'X-CSRF-TOKEN':token},
                type:'PUT',
                dataType:'json',
                data:{tramite:name}
            });
        });
    </script>

@endsection
