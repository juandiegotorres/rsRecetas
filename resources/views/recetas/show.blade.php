@extends('layouts.app')

@section('categorias')
    @include('ui.categorias')
@endsection

@section('content')
    <div class="container bg-white redondeado shadow py-4 contenido-receta">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
        
        {{-- <div class=" mt-3 mb-4"> --}}
            <img src="/storage/{{$receta->imagen}}" alt="" class="img-receta rounded shadow">
        {{-- </div> --}}
        <div class="row info-receta">
            <div class="receta-meta mt-2 pt-3">
                <p>
                    <span class="font-weight-bold text-primary">Escrito en:</span>
                    {{$receta->categoria->nombre}}
                </p>
                
                <p>
                    <span class="font-weight-bold text-primary">Autor:</span>
                    {{$receta->autor->name}}
                </p>
                <p>
                    <span class="font-weight-bold text-primary">Fecha:</span>
                    @php
                        $fecha = $receta->created_at
                    @endphp
                    <fecha-receta fecha ="{{$fecha}}"></fecha-receta>
                </p>

                <div class="ingedientes pt-2">
                    <h2 class="my-3 text-primary subtitulo-receta">Ingredientes</h2>
                    {{-- <div class="biografia redondeado p-3"> --}}
                        {!! $receta->ingredientes !!}    
                    {{-- </div> --}}
                </div>
                <div class="preparacion">
                    <h2 class="my-3 text-primary subtitulo-receta">Preparación</h2>
                    {{-- <div class="biografia redondeado p-3"> --}}
                        {!! $receta->preparacion !!}    
                    {{-- </div> --}}
                    
                </div>
            </div>
            <div class="m-auto">
                <like-button
                    receta-id="{{ $receta->id }}"
                    like = "{{$like}}"
                    likes = "{{$likes}}"
                ></like-button>
            </div>
                
        </div>

  


    {{-- <article class="contenido-receta">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
        
        <div class="imagen-receta">
            <img src="/storage/{{$receta->imagen}}" alt="" class="w-100">
        </div>

        <div class="receta-meta mt-2">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{$receta->categoria->nombre}}
            </p>
            
            <p>
                <span class="font-weight-bold text-primary">Autor:</span>
                {{$receta->autor->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha:</span>
                @php
                    $fecha = $receta->created_at
                @endphp
                <fecha-receta fecha ="{{$fecha}}"></fecha-receta>
            </p>

            <div class="ingedientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!! $receta->ingredientes !!}
            </div>
            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparación</h2>
                {!! $receta->preparacion !!}
            </div>
        </div>
         
            <like-button
                receta-id="{{ $receta->id }}"
                like = "{{$like}}"
                likes = "{{$likes}}"
            ></like-button>
           
    </article> --}}

        

@endsection