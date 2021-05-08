@extends('layouts.app')

@section('content')

    <div class="container mb-10">
        <div class="row py-5 bg-white shadow redondeado">
            <div class="col-md-5 pb-5 px-5 pt-2">
                @if ($perfil->imagen)
                    <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="imagen chef">  
                @else
                    <img src="{{asset('/images/default.png')}}" class="w-100 rounded-circle border border-dark" alt="imagen chef">  
                @endif
            </div>
            <div class="col-md-7 mt-md-2 ">
                <h2 class="text-center mb-2 text-primary mb-4 text-uppercase">Chef: {{ $perfil->usuario->name }}</h2>
                <a href="{{ $perfil->usuario->url }}" target="_blank">Visitar sitio web</a>
                <p class="mt-2">Biografía:</p>
                <div class="biografia p-3 rounded">
                        {!! $perfil->biografia !!}    
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row m-10 p-4">
            
        </div>
    </div>
    
    <div class="container">
        
        <div class="row p-4 bg-white shadow redondeado">
        <h2 class="my-4 text-center col-md-12">Recetas del chef: {{$perfil->usuario->name }}</h2>
            @if(count($recetas) > 0)
                 @foreach ($recetas as $receta)
                    <div class="col-md-4 mt-4">
                        <div class="card"> 
                            <img class="card-img-top" src="/storage/{{$receta->imagen}}" alt="Imagen Receta">
                            <div class="card-body">
                                <h3>{{ Str::upper($receta->titulo) }}</h3>
                                
                                <div class="meta-receta d-flex justify-content-between">
                                    @php
                                        $fecha = $receta->created_at
                                    @endphp
                                    <p class="text-primary fecha font-weight-bold">
                                        <fecha-receta fecha ="{{$fecha}}"></fecha-receta>
                                    </p>
                                    <p>{{count($receta->likes)}}
                                        <span style="font-size: 14px; color: red;">
                                            <i class="fa fa-heart"></i>
                                        </span>
                                    </p>
                                </div>
                                <p class="card-text">
                                        {{ Str::words (strip_tags($receta->preparacion) , 15, ' ...') }}
                                </p>
                                {{-- <p>{{ Str::words (strip_tags($receta->preparacion) , 15) }}</p> --}}
                                <a href="{{ route('recetas.show', ['receta' => $receta->id])}}" 
                                    class="btn btn-primary d-block btn-receta">Ver receta</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center w-100">No hay recetas aún</p>
            @endif
        </div>
        <div class="justify-content-center d-flex">
            {{$recetas->links()}}
        </div>
    </div>
    <div class="d-flex">
       
    </div>    
@endsection
{{-- <div class="col-md-4 mb-3">  
    <div class="card"> 
        <img class="card-img-top" src="/storage/{{$receta->imagen}}" alt="Imagen Receta">
        <div class="card-body">
            <h5 class="card-title">{{$receta->titulo}}</h5>
            <a href="{{ route('recetas.show', ['receta' => $receta->id])}}" class="btn btn-primary d-block mt-4 text-uppercase font-weight-bold" target="_blank">Ver Receta</a>
        </div>
    </div>
</div> --}}