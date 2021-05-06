@extends('layouts.app')

@section('styles')
{{-- Owl carousel --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
@endsection

@section('content')
    
    
   
   
    <div class="container nuevas-recetas"> 
        <div class="titulo-container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Últimas recetas</h2>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach ($nuevas as $nueva)
                <div class="card"> 
                    <img class="card-img-top" src="/storage/{{$nueva->imagen}}" alt="Imagen Receta">
                    <div class="card-body">
                        <h3>{{ Str::upper($nueva->titulo) }}</h3>
                        <p>{{ Str::words (strip_tags($nueva->preparacion) , 15,' ...') }}</p>
                        <a href="{{ route('recetas.show', ['receta' => $nueva->id])}}" 
                            class="btn btn-primary d-block font-weight-bold text-uppercase">Ver receta</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <div class="container">  
        <div class="titulo-container">
            <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas más votadas</h2>
        </div>

        <div class="row">
            @foreach ($votadas as $receta)
                @include('ui.receta')
            @endforeach
        </div>
    </div>
    @foreach($recetas as $key => $grupo) 
        <div class="container">  
            <div class="titulo-container">
                <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace('-', ' ', $key) }}</h2>
            </div>

            <div class="row">
                @foreach($grupo as $recetas)
                    @foreach ($recetas as $receta)
                        @include('ui.receta')
                    @endforeach
                @endforeach
            </div>
        </div>
    @endforeach

@endsection