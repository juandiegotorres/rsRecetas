@extends('layouts.app')

@section('botones')
  <a href="{{ route('recetas.create') }}" class="btn btn-primary mr-2 text-white">Nueva Receta</a>
@endsection

@section('content')

    <h2 class="text-center mb-2">Recetas</h2>
    

    <div class="col-md-10 mx-auto bg-white p-3">
         <table class="table">
             <thead class="bg-primary text-light" >
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
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Actualizar Receta">
                        </div>
                            
                        </div>
                        
                        
                            
                            
                            
                        
                        
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
    </div>

@endsection
