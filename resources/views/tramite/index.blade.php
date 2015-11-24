@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')
    
@section('content')
    <h1>Tramites</h1>
    <div class="col-md-5">
    <ol>
    @foreach($tramites as $t)
        <li>

            <a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">{{$t->nombre}}</a>
            <?php $sw=false?>
            @foreach($seguimiento as $s)
                @if($t->id==$s->id_tramites and $s->id_user==Auth()->user()->id)
                    <?php $sw=true?>
                @endif
            @endforeach

        </li>
    @endforeach
    </ol>
    </div>
      

@endsection