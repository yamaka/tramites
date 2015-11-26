@extends('layouts.header')
@section('title','Tramites Inicio')
@section('content')
        <style>
            .carousel-inner>.item>img{
            top:0;
            left:0;
            min-width:100%;
            height:350px;
            }

        </style>
        <!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
         <li data-target="#myCarousel" data-slide-to="5"></li>
    </ol>   
    <div class="carousel-inner" role="listbox" >
        <div class="item active">
            <img class="first-slide" src="{{asset('/image/bandera.jpg')}}" alt="First slide" >
            <div class="container" >
                <div class="carousel-caption" >
                    <h1>Guia de Trámites</h1>
                    <p>La Guía de Trámites es un portal de información que permite a los ciudadanos, 
                        sociedad civil que operan en la ciudad de La Paz, conocer sobre procedimientos,
                         requisitos, pasos e instituciones responsables de los trámites más relevantes
                          gestionados ante los distintos ministerios y reparticiones de la Administración
                           Pública Central del Gobierno de Bolivia.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="{{asset('/image/licencia.jpg')}}" alt="Second slide"  >
            <div class="container">
                <div class="carousel-caption">
                    <h1>Objetivo Principal.</h1>
                    <p>Nuestro objetivo primordial es garantizar el acceso a la información a todos los ciudadanos
                     con el propósito de buscar, recibir, acceder y difundir información pública, como 
                     derecho y un requisito indispensable para el fortalecimiento a la Democracia.
                    </p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="{{asset('/image/ministerio.jpg')}}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Bienvenido a Tramites en La Paz.</h1>
                    <p>La pagina web esta diseñada para proporcionar informacion querida para tramites en
                        nuestra ciudad de La Paz.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="{{asset('/image/segip.jpg')}}" alt="Fuor slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Colaborativo</h1>
                    <p>La gran facilidad de ubicar las entidades dentro de nuestra ciudad.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="{{asset('/image/pasaporte.jpg')}}" alt="five slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Impresindible.</h1>
                    <p>Mostrar todos y cada uno de los requisitos de algun trámite.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Las Entidades Publicas en La Paz<span class="text-muted">Habitualmente</span></h4>
                <p class="lead">Cumplen un rol muy importante para, obtener  certificados personales que por derecho 
                    una persona natural la ciudad de La Paz requiere.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive center-block"  src="{{asset('/image/segip.jpg')}}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 col-md-push-5">
                <h2 class="featurette-heading">Servicio General de Identidficacion Personal. <span class="text-muted">Importante</span></h2>
                <p class="lead">La Entidad está encargado de dar un número de identidad,asi tener derechos y obigaciones.
                    </p>
            </div>
            <div class="col-md-5 col-md-pull-7">
                <img class="featurette-image img-responsive center-block" src="{{asset('/image/segip1.jpg')}}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Policia Nacional<span class="text-muted">Division de Documentos.</span></h2>
                <p class="lead">Es la encargada de proporcionar certificacion de buena conducta y antecedentes
                en nuestra cuidad.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-responsive center-block" src="{{asset('/image/pn1.jpg')}}"  alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->


@endsection
