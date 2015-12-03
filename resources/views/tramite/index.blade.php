@extends('layouts.header')
@section('title', 'Tramites')
@section('active','active')
@section('scripts')
    <link href="{{asset('/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    @endsection
    
@section('content')
    <h1>Tramites</h1>
    <div >
        @foreach($tramites as $t)
            <div class="col-lg-3 col-md-6">

                <div class="panel panel-<?php $array=['primary','success','danger','warning']; $k = array_rand($array);
                $v = $array[$k];echo $v?>">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-credit-card fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$t->id}}</div>
                                <div>{{$t->nombre}}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('tramite.show', $t->id)}}" title="{{$t->descripcion}}">
                        <div class="panel-footer">
                            <span class="pull-left">Ver Detalles</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

    </div>


@endsection