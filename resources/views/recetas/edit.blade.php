@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
@endsection

@section('botones')
  <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')

    <h2 class="text-center mb-2">Editar Receta: {{$receta->titulo}}</h2>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form 
                method="POST" 
                action="{{ route('recetas.update', ['receta' => $receta->id]) }}" 
                enctype="multipart/form-data" 
                novalidate
            >
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Título Receta</label>

                    <input type="text"
                        name="titulo"
                        class="form-control @error('titulo') is-invalid @enderror"
                        id="titulo"
                        placeholder="Título Receta"
                        value="{{ $receta->titulo }}"
                     >
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="categoria">Categoría</label>
                    <select 
                        name="categoria" 
                        class="form-control @error('categoria') is-invalid @enderror"
                        id="categoria">
                        <option value="">--Seleccione--</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" 
                            {{ $receta->categoria_id == $categoria->id ? 'selected' : '' }}
                            > {{ $categoria->nombre }} </option>    
                        @endforeach
                        
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="preparacion">Preparación</label>
                    <input id="preparacion" type="hidden" name="preparacion" value="{{ $receta->preparacion }}">
                    <trix-editor 
                        class="form-control @error('preparacion') is-invalid @enderror"
                        input="preparacion"></trix-editor>
                    @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="ingredientes">Ingredientes</label>
                    <input id="ingredientes" type="hidden" name="ingredientes" value="{{ $receta->ingredientes }}">
                    <trix-editor
                        class="form-control @error('ingredientes') is-invalid @enderror"
                        input="ingredientes"></trix-editor>
                 @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="imagen">Elegir imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    <div class="mt-4">
                        <p>Imagen actual:</p>
                        <img src="/storage/{{$receta->imagen}}" style="width: 300px">
                    </div>
                 @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                </div>
                {{-- <actualizar-receta
                    receta-id={{$receta->id}}
                >
                </actualizar-receta> --}}
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar receta">
                </div>
            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
@endsection