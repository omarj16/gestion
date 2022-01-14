@extends('layouts.app')

@section('content')
<div class="page-title page-title-about bg-pattern" data-bgcolor="5295BD">
    <div class="page-title-overlay">
        <div class="container">
            <br>
            <h1 class="titulo">ControlSistem v2.0</h1>
            <p>.</p>

        </div>
    </div>
</div>



<div class="history">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 history-images">
                <div class="image-carousel">

                    <div class="owl-image-carousel" id="owl-image-carousel">
                                    
                        <div class="image-carousel-item">
                            <div class="text-center" >
                                
                            <img src="{{ asset('imagenes/logo.png') }}" alt="" />
                           
                            <h2 class="titulo2">Control de Atención al Cliente</h2>

                            </div>

                        </div>
                        
                    </div>
                                
                                
                </div>
            </div>
            
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 history-text">
                    <div class="card-body">  
                        <p class="texto">El control de los procesos de atención al cliente en cualquier empresa debe mantener un estricto control sobre los procesos internos de atención al cliente. Está comprobado que más del 20% de las personas que dejan de asistir a un comercio, debido a fallas de información de atención cuando se interrelaciona con las personas encargadas de atender.</p>
                    </div>
            </div>
            
        </div>
    </div>
</div>
@endsection