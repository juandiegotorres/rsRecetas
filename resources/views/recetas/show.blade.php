@extends('layouts.app')

@section('content')
    <article class="contenido-receta">
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
            {{-- @if($likes>1)
                <h4 class="text-center">A {{$likes}} personas les gusta esta receta</h4>
            @else
                <h4 class="text-center">A {{$likes}} persona le gusta esta receta</h4>
            @endif --}}
            
    </article>

@endsection