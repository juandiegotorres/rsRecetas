@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha512-494Ejp/5WyoRNfh+nPLhSCQPHhcsbA5PoIGv2/FuEo+QLfW+L7JQGPdh8Qy2ZOmkF27pyYlALrxteMiKau1tyw==" crossorigin="anonymous" />
@endsection

@section('botones')
  <a href="{{ route('recetas.index') }}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')

   <h1 class="text-center">Editar mi perfil</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-withe p-3">
            <form 
                action="{{route('perfiles.update', ['perfil' => $perfil->id])}}"
                method="POST"
                enctype="multipart/form-data"   
                 
            >
                @csrf
                @method('PUT')
                 <div class="form-group">
                    <label for="nombre">Nombre</label>

                    <input type="text"
                        name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Tu nombre"
                        value="{{ $perfil->usuario->name }}"
                     >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                 <div class="form-group mt-3">
                    <label for="url">Sitio Web</label>

                    <input type="text"
                        name="url"
                        class="form-control @error('url') is-invalid @enderror"
                        id="url"
                        placeholder="Tu url"
                        value="{{ $perfil->usuario->url }}"
                     >
                    @error('url')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="biografia">Biografía</label>
                    <input id="biografia" type="hidden" name="biografia" value="{{ $perfil->biografia }}">
                    <trix-editor 
                        class="form-control @error('biografia') is-invalid @enderror"
                        input="biografia"></trix-editor>
                    @error('biografia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                 @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="imagen">Tu imagen</label>
                    <input 
                        id="imagen"
                        type="file"
                        class="form-control @error('imagen') is-invalid @enderror"
                        name="imagen"
                    >
                    @if ($perfil->imagen)
                        <div class="mt-4">
                            <p>Imagen actual:</p>
                            <img src="/storage/{{$perfil->imagen}}" style="width: 300px">
                        </div>
                        @error('imagen')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Actualizar perfil">
                </div>
            </form>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha512-wEfICgx3CX6pCmTy6go+PmYVKDdi4KHhKKz5Xx/boKOZOtG7+rrm2fP7RUR2o4m/EbPdwbKWnP05dvj4uzoclA==" crossorigin="anonymous" defer></script>
@endsection
