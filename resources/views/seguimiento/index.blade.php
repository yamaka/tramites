@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')
    
@section('content')
    <h1>Tramites</h1>
    <div class="col-md-5">
    <ol>
    @foreach($seg as $tr)
            @if($tr->id_user==auth()->user()->id)
                @foreach($tramites as $t)
                    @if($tr->id_tramites==$t->id)
                            <li>{{$t->nombre}}</li>
                    @endif
                @endforeach
            @endif
        @endforeach</ol>
    </div>
      
    <div class="col-md-3">
        <img  src="{{ asset('/image/ima.png')}}" alt="">
    </div>
@endsection