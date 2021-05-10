@extends('layouts.app')

@section('botones')
    
@endsection

@section('content')
    <div class="py-3 mt-2 mb-3 col-12 justify-content-center d-flex">
        @include('ui.navegacion')
    </div>
    
    <div class="col-md-10 mx-auto bg-white p-3 redondeado shadow">
        <h2 class="text-center mb-4">Tus recetas</h2>
        <table class="table">
             <thead class="bg-primary text-light pt-4" >
                <tr>
                    <th scole="col">Titulo</th>
                    <th scole="col">Categoría</th>
                    <th scole="col" class="text-right col-xs-5">Acciones</th>
                </tr>
             </thead>
             <tbody>
                 @foreach ($recetas as $receta)
                 <tr>
                     <td>{{ $receta->titulo }}</td>
                     <td>{{ $receta->categoria->nombre}}</td>
                     <td>
                        {{-- <a href="" class="btn btn-success mr-1">Ver</a>  --}}
                        {{-- <a href="" class="btn btn-dark mr-1">Editar</a> --}}
                        {{-- <a href="" class="btn btn-danger mr-1">Eliminar</a>  --}}
                        <div class="d-flex justify-content-end">
                        <a href="{{ route('recetas.show', ['receta' => $receta->id ]) }}">
                            <button class="btn btn-success mr-2">
                                <i class="fa fa-info-circle"></i>
                            </button>
                        </a>
                        <a href="{{ route('recetas.edit', ['receta' => $receta->id ]) }}">
                            <button class="btn btn-primary mr-2">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </a>

                        <eliminar-receta receta-id="{{ $receta->id }}"></eliminar-receta>
                        {{-- <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Actualizar Receta">
                        </div> --}}
                            
                        </div>                   
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
         <div class="col-12 mt-4 d-flex justify-content-center">
            {{$recetas->links()}}
         </div>
         @if(count($likes) > 0)
         <h2 class="text-center my-3">Recetas que te gustan</h2>
         <div class="col-md-10 mx-auto bg-white p-3">
             <ul class="list-group">
                 @foreach ($likes as $like)
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="align-middle">{{$like->titulo}}</span>
                        <a class="btn btn-outline-success text-uppercase font-weight-bold" href="{{route('recetas.show', ['receta' => $like->id])}}">Ver</a> 
                     </li>
                 @endforeach
             </ul>
         </div>
         @else
            <p class="text-center">Aún no tienes recetas guardadas <br><small>Dale me gusta a y aparecerán aquí</small></p>
         @endif
    </div>

@endsection
