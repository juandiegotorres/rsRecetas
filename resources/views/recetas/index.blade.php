@extends('layouts.app')

@section('content')

<h1>Recetas</h1>
@foreach ($recetas as $receta)
    <li>{{ $receta }}</li>
@endforeach

@endsection