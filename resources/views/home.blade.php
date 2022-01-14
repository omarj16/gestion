@extends('layouts.app')
@section('title', 'New')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agregar Cliente Nuevo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                        <p>
                        <i>Personas en espera Cola 1: </i><B> {{ $countcola1 }} </B>
                        <br>
                        <i>Personas en espera Cola 2: </i><B> {{ $countcola2 }} </B>
                        </p>



        <form class="form-horizontal" method="post" action="{{route('home')}}">


                        @foreach ($errors->all() as $error)
                            <span class="alert alert-danger">{{$error}}</span>
                        @endforeach

                        <!-- {!! csrf_field() !!} -->
                        @csrf
            <fieldset>
                
                <div class="make">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12 make-text">
                                <label for="documento" class="col-lg-2 control-label">ID</label>
                                <input type="text" class="form-control" id="documento" name="documento" value="{{old('documento')}}" autofocus placeholder="No. Documento">
                            </div>
                            
                            <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12 make-button">
                                <label for="nombre" class="col-lg-6 control-label">Nombres y Apellidos</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}" placeholder="Datos">
                            </div>
                    
                </div>
            <br>
            @if($countcola1<=$countcola2)  <!-- se asigna la cola con menor número de tickets  -->

                <div class="row">
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12 make-text">
                            <label for="cola1" class="col-lg-2 control-label">Cola 1</label>
                            <input type="text" readonly class="form-control" id="ticket" placeholder="ticket" value="{{$ticket1}}" name="ticket">
                            <input type="hidden" class="form-control" id="cola" value="1" name="cola">
                            </div>
                            
                    
                </div>

            @else
                <div class="row">
                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12 make-text">
                            <label for="cola2" class="col-lg-2 control-label">Cola 2</label>
                            <input type="text" readonly class="form-control" id="ticket" value="{{$ticket2}}" name="ticket">
                            <input type="hidden" class="form-control" id="cola" name="cola" value="2">
                            </div>
                </div>
            @endif
                            
                    
                    <br>
                    <div class="form-group text-center">
                        <div class="col-lg-12 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>
            </fieldset>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
