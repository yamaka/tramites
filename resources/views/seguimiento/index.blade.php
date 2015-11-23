@extends('layouts.header')
@section('title', 'Tramites')
@section('activeme','active')
    
@section('content')
    <h1>Tramites</h1>

    <div class="col-md-5">
        <button class='btn btn-info'  data-toggle='modal'  data-target='#editReq'><i class='fa fa-pencil fa-lg'></i> Editar</button>

    <ol>
    @foreach($seg as $tr)
            @if($tr->id_user==Auth()->user()->id)
                @foreach($tramites as $t)
                    @if($tr->id_tramites==$t->id)
                        <li><a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">{{$t->nombre}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach</ol>
    </div>
    <div class="modal fade" id="editReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Titulo</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(array('action'=>'seguimientoTramiteController@store','class'=>'form-horizontal')) !!}


                    <div class="col-md-4">
                        <ol>
                            @foreach($tramites as $t)
                                <li >
                                    <a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">{{$t->nombre}}</a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <ul style="list-style:none">
                            @foreach($tramites as $t)
                                <li >
                                    <?php $sw=false?>
                                    @foreach($seg as $s)
                                        @if($t->id==$s->id_tramites and $s->id_user==Auth()->user()->id)
                                            <?php $sw=true?>
                                        @endif
                                    @endforeach
                                    @if($sw)
                                        <input type="checkbox" name="ids" checked   value="{{$t->id}}" data-toggle="switch" id="custom-switch-{{$t->id}}" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />
                                    @else
                                        <input type="checkbox" unchecked name="ids"  value="{{$t->id}}" data-toggle="switch" id="custom-switch-{{$t->id}}" data-on-text="<span class='fui-check'></span>" data-off-text="<span class='fui-cross'></span>" />
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <input type="hidden" name="tramites" id="ids" value="">
                    <script>
                        $(document).ready(function(){
                            $('#update').on('click',function(){
                                $('#ids').val(null);
                                $("input[type='checkbox'][name='ids']").each(function () {
                                    if($(this).prop("checked")){
                                        $('#ids').val($(this).val()+', '+$('#ids').val());
                                    }
                                });
                                $('#ids').val($('#ids').val().substr(0,$('#ids').val().length-2));
                            });
                        });
                    </script>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Guardar', array('id'=>'update','class'=>'btn btn-primary')) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection