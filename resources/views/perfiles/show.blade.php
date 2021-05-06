@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 pb-5 px-5 pt-2">
                @if ($perfil->imagen)
                    <img src="/storage/{{$perfil->imagen}}" class="w-100 rounded-circle" alt="imagen chef">                    
                @endif
            </div>
            <div class="col-md-7 mt-5 mt-md-0 ">
                <h2 class="text-center mb-2 text-primary mb-4">{{ $perfil->usuario->name }}</h2>
                <a href="{{ $perfil->usuario->url }}" target="_blank">Visitar sitio web</a>
                <div class="biografia">
                    {!! $perfil->biografia !!}
                </div>
            </div>
        </div>
    </div>
    <h2 class="my-4 text-center">Recetas del chef: {{$perfil->usuario->name }}</h2>
    <div class="container">
        <div class="row mx-auto bg-white p-4">
            @if(count($recetas) > 0)
                 @foreach ($recetas as $receta)
                    <div class="col-lg-4 d-flex align-items-stretch mb-3">  
                        <div class="card"> 
                            <img class="card-img-top" src="/storage/{{$receta->imagen}}" alt="Imagen Receta">
                            <div class="card-body d-flex flex-column ">
                                <h5 class="card-title d-flex mb-3 justify-content-center text-center">{{$receta->titulo}}</h5>
                               
                                <a class="align-self-end btn btn-lg btn-block btn-primary" style="margin-top: auto!important;" href="{{ route('recetas.show', ['receta' => $receta->id])}}" target="_blank">Ver Receta </a>
                                {{-- <button class="align-self-end btn btn-lg btn-block btn-primary" style="margin-top: auto!important;">
                                    <a href="{{ route('recetas.show', ['receta' => $receta->id])}}" target="_blank"></a>
                                    Ver Receta
                                </button> --}}
                                
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