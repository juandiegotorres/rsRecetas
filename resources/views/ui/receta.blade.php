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